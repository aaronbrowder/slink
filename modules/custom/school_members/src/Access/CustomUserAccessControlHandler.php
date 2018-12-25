<?php

namespace Drupal\school_members\Access;

use Drupal\user\Entity\User;
use Drupal\user\UserAccessControlHandler;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Access\AccessResultNeutral;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines the custom access control handler for the user entity type.
 */
class CustomUserAccessControlHandler extends UserAccessControlHandler {

    /**
    * {@inheritdoc}
    */
    protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
        
        // We don't treat the user label as privileged information, so this check
        // has to be the first one in order to allow labels for all users to be
        // viewed, including the special anonymous user.
        if ($operation === 'view label') {
          return AccessResult::allowed();
        }
    
        // The anonymous user's profile can neither be viewed, updated nor deleted.
        if ($entity->isAnonymous()) {
          return AccessResult::forbidden();
        }
    
        // Administrators can view/update/delete all user profiles.
        if ($account->hasPermission('administer users')) {
          return AccessResult::allowed()->cachePerPermissions();
        }
    
        switch ($operation) {
          case 'view':
            // Only allow view access if the account is active.
            if ($account->hasPermission('access user profiles') && $entity->isActive()) {
              return AccessResult::allowed()->cachePerPermissions()->addCacheableDependency($entity);
            }
            // Users can view own profiles at all times.
            elseif ($account->id() == $entity->id()) {
              return AccessResult::allowed()->cachePerUser();
            }
            else {
              return AccessResultNeutral::neutral("The 'access user profiles' permission is required and the user must be active.")->cachePerPermissions()->addCacheableDependency($entity);
            }
            break;
    
          case 'update':
            // Users can always edit their own account.
            // School admins can edit the accounts of their school members.
            return AccessResult::allowedIf(self::isSchoolMember($entity) || $account->id() == $entity->id())->cachePerPermissions()->cachePerUser();
    
          case 'delete':
            // Users with 'cancel account' permission can cancel their own account.
            // School admins can delete the accounts of their school members.
            return AccessResult::allowedIf(self::isSchoolMember($entity) || ($account->id() == $entity->id() && $account->hasPermission('cancel account')))->cachePerPermissions()->cachePerUser();
        }
    
        // No opinion.
        return AccessResult::neutral();
    }
    
    public static function isSchoolMember(EntityInterface $entity) {
        $current_user = User::load(\Drupal::currentUser()->id());
        if ($entity->id() == $current_user->id()) return false;
        if (!$current_user->hasRole('school_admin')) return false;
        $current_user_school = $current_user->get('field_school')->entity;
        $entity_school = $entity->get('field_school')->entity;
        return $current_user_school->id() == $entity_school->id();
    }
}