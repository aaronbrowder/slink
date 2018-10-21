<?php

namespace Drupal\webform;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityHandlerInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\webform\Access\WebformAccessResult;
use Drupal\webform\Plugin\WebformSourceEntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Defines the access control handler for the webform entity type.
 *
 * @see \Drupal\webform\Entity\Webform.
 */
class WebformEntityAccessControlHandler extends EntityAccessControlHandler implements EntityHandlerInterface {

  /**
   * The request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Webform source entity plugin manager.
   *
   * @var \Drupal\webform\Plugin\WebformSourceEntityManagerInterface
   */
  protected $webformSourceEntityManager;

  /**
   * Webform access rules manager service.
   *
   * @var \Drupal\webform\WebformAccessRulesManagerInterface
   */
  protected $accessRulesManager;

  /**
   * WebformEntityAccessControlHandler constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type definition.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\webform\Plugin\WebformSourceEntityManagerInterface $webform_source_entity_manager
   *   Webform source entity plugin manager.
   * @param \Drupal\webform\WebformAccessRulesManagerInterface $access_rules_manager
   *   Webform access rules manager service.
   */
  public function __construct(EntityTypeInterface $entity_type, RequestStack $request_stack, EntityTypeManagerInterface $entity_type_manager, WebformSourceEntityManagerInterface $webform_source_entity_manager, WebformAccessRulesManagerInterface $access_rules_manager) {
    parent::__construct($entity_type);

    $this->requestStack = $request_stack;
    $this->entityTypeManager = $entity_type_manager;
    $this->webformSourceEntityManager = $webform_source_entity_manager;
    $this->accessRulesManager = $access_rules_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function createInstance(ContainerInterface $container, EntityTypeInterface $entity_type) {
    return new static(
      $entity_type,
      $container->get('request_stack'),
      $container->get('entity_type.manager'),
      $container->get('plugin.manager.webform.source_entity'),
      $container->get('webform.access_rules_manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    // Check 'administer webform' and 'create webform' permissions.
    if ($account->hasPermission('administer webform')) {
      return WebformAccessResult::allowed();
    }
    elseif ($account->hasPermission('create webform')) {
      return WebformAccessResult::allowed();
    }
    else {
      return WebformAccessResult::neutral();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\webform\WebformInterface $entity */

    // Check 'administer webform' permission.
    if ($account->hasPermission('administer webform')) {
      return WebformAccessResult::allowed();
    }

    // Check 'administer' access rule.
    if ($account->isAuthenticated()) {
      $administer_access_result = $this->accessRulesManager->checkWebformAccess('administer', $account, $entity);
      if ($administer_access_result->isAllowed()) {
        return $administer_access_result;
      }
    }

    // Check if 'view' (aka 'access configuration'), 'update', or 'delete'
    // of 'own' or 'any' webform is allowed.
    if ($account->isAuthenticated()) {
      $is_owner = ($account->id() == $entity->getOwnerId());
      switch ($operation) {
        case 'view':
          // The 'view' operation is reserved for accessing a
          // webform's configuration via the REST API.
          if ($account->hasPermission('access any webform configuration') || ($account->hasPermission('access own webform configuration') && $is_owner)) {
            return WebformAccessResult::allowed($entity, TRUE);
          }
          break;

        case 'test':
        case 'update':
          if ($account->hasPermission('edit any webform') || ($account->hasPermission('edit own webform') && $is_owner)) {
            return WebformAccessResult::allowed($entity, TRUE);
          }
          break;

        case 'duplicate':
          if ($account->hasPermission('create webform') && ($entity->isTemplate() || ($account->hasPermission('edit any webform') || ($account->hasPermission('edit own webform') && $is_owner)))) {
            return WebformAccessResult::allowed($entity, TRUE);
          }
          break;

        case 'delete':
          if ($account->hasPermission('delete any webform') || ($account->hasPermission('delete own webform') && $is_owner)) {
            return WebformAccessResult::allowed($entity, TRUE);
          }
          break;
      }
    }

    // Check webform access rules.
    $rules_access_result = $this->accessRulesManager->checkWebformAccess($operation, $account, $entity);
    if ($rules_access_result->isAllowed()) {
      return $rules_access_result;
    }

    // Convert 'render' operation to 'submission_create' operation.
    // @see https://www.drupal.org/project/drupal/issues/2820315
    // @see https://www.drupal.org/project/webform/issues/2956771
    if ($operation === 'render') {
      $operation = 'submission_create';
    }

    // Check submission_* operation.
    if (strpos($operation, 'submission_') === 0) {
      // Grant user with administer webform submission access to do whatever he
      // likes on the submission operations.
      if ($account->hasPermission('administer webform submission')) {
        return WebformAccessResult::allowed();
      }

      // Allow users with 'view any webform submission' or
      // 'administer webform submission' to view all submissions.
      if ($operation === 'submission_view_any' && ($account->hasPermission('view any webform submission') || $account->hasPermission('administer webform submission'))) {
        return WebformAccessResult::allowed();
      }

      // Allow users with 'view own webform submission' to view own submissions.
      if ($operation === 'submission_view_own' && $account->hasPermission('view own webform submission')) {
        return WebformAccessResult::allowed();
      }

      // Allow (secure) token to bypass submission page and create access controls.
      if (in_array($operation, ['submission_page', 'submission_create'])) {
        $token = $this->requestStack->getCurrentRequest()->query->get('token');
        if ($token && $entity->isOpen()) {
          /** @var \Drupal\webform\WebformSubmissionStorageInterface $submission_storage */
          $submission_storage = $this->entityTypeManager->getStorage('webform_submission');

          $source_entity = $this->webformSourceEntityManager->getSourceEntity(['webform']);
          if ($submission = $submission_storage->loadFromToken($token, $entity, $source_entity)) {
            return WebformAccessResult::allowed($submission)
              ->addCacheContexts(['url']);
          }
        }
      }

      // The "page" operation is the same as "create" but requires that the
      // Webform is allowed to be displayed as dedicated page.
      // Used by the 'entity.webform.canonical' route.
      if ($operation === 'submission_page') {
        // Completely block access to a template if the user can't create new
        // Webforms.
        $create_access = $entity->access('create', $account, TRUE);
        if ($entity->isTemplate() && !$create_access->isAllowed()) {
          return WebformAccessResult::forbidden($entity)
            ->addCacheableDependency($create_access);
        }

        // Block access if the webform does not have a page URL.
        if (!$entity->getSetting('page')) {
          $source_entity = $this->webformSourceEntityManager->getSourceEntity(['webform']);
          if (!$source_entity) {
            return WebformAccessResult::forbidden($entity);
          }
        }
      }

      // Convert submission 'page' to corresponding 'create' access rule.
      $submission_operation = str_replace('submission_page', 'submission_create', $operation);
      // Remove 'submission_*' prefix.
      $submission_operation = str_replace('submission_', '', $submission_operation);

      // Check webform submission access rules.
      $submission_access_result = $this->accessRulesManager->checkWebformAccess($submission_operation, $account, $entity);
      if ($submission_access_result->isAllowed()) {
        return $submission_access_result;
      }

      // Check webform 'update' access.
      $update_access_result = $this->checkAccess($entity, 'update', $account);
      if ($update_access_result->isAllowed()) {
        return $update_access_result;
      }
    }

    // NOTE: Not calling parent::checkAccess().
    // @see \Drupal\Core\Entity\EntityAccessControlHandler::checkAccess
    if ($operation === 'delete' && $entity->isNew()) {
      return WebformAccessResult::forbidden($entity);
    }
    elseif ($operation === 'view') {
      return WebformAccessResult::neutral($entity)
        ->setReason("The 'administer webform' or 'access own or any webform configuration' permission is required.");
    }
    else {
      return WebformAccessResult::neutral($entity);
    }
  }

}
