<?php

namespace Drupal\forum_notification\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\forum_notification\ForumNotificationService;

/**
 * Class ForumNotification implements settings for admin notification.
 */
class ForumNotification extends ConfigFormBase {

  /** A instance of the forum_notification helper services.
   *
   * @var \Drupal\forum_notification\ForumNotificationService
   */
  protected $ForumNotificationService;

  /**
   * {@inheritdoc}
   */
  public function __construct(ForumNotificationService $ForumNotificationService) {
    $this->ForumNotificationService = $ForumNotificationService;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('forum_notification.common')
    );
  }

  /**
   * Get the form_id.
   *
   * @inheritDoc
   */
  public function getFormId() {
    return 'forum_notification_form';
  }

  /**
   * Build the Form.
   *
   * @inheritDoc
   */
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL) {
    $config = $this->config('forum_notification.settings');
    $form = [];
    // $form['forum_notification_content_types'] = [
    //   '#type' => 'fieldset',
    //   '#title' => $this->t('Select the content types'),
    //   '#description' => $this->t('Choose the content type for which you want notification on content insert/update.'),
    // ];

    // $default_content_types = ($config->get('forum_notification_node_types')) ?: [];
    // $form['forum_notification_content_types']['forum_notification_node_types'] = [
    //   '#type' => 'checkboxes',
    //   '#title' => $this->t('Content types'),
    //   '#default_value' => $default_content_types,
    //   '#options' => node_type_get_names(),
    // ];

    // $trigger_node_update = ($config->get('forum_notification_trigger_on_node_update')) ?: FALSE;
    // $form['forum_notification_trigger_on_node_update'] = [
    //   '#type' => 'checkbox',
    //   '#title' => $this->t('Enable on content update'),
    //   '#default_value' => $trigger_node_update,
    //   '#description' => $this->t('Please check on it if you want to send notification on update action as well.'),
    // ];

    // $trigger_node_status = ($config->get('forum_notification_trigger_on_node_status')) ?: 0;
    // $content_status = [];
    // $content_status[0] = $this->t('Notify for both published and unpublished content.');
    // $content_status[1] = $this->t('Only notify for published content');
    // $content_status[2] = $this->t('Only notify for unpublished content');
    // $form['forum_notification_trigger_on_node_status'] = [
    //   '#type' => 'radios',
    //   '#title' => $this->t('Content status'),
    //   '#options' => $content_status,
    //   '#default_value' => $trigger_node_status,
    //   '#description' => $this->t('Select if you want to limit notifications to only published or only unpublished content.'),
    // ];

    // $trigger_for_roles = ($config->get('forum_notification_allowed_roles')) ?: [];
    // $user_roles = user_role_names();
    // $form['forum_notification_allowed_roles'] = [
    //   '#type' => 'checkboxes',
    //   '#title' => $this->t('Select roles'),
    //   '#options' => $user_roles,
    //   '#default_value' => $trigger_for_roles,
    //   '#description' => $this->t('Please select the roles for which email notifications should trigger on content insert/update'),
    // ];

    // $form['forum_notification_recepient_fieldset'] = [
    //   '#type' => 'fieldset',
    //   '#title' => $this->t('Email Recipients'),
    // ];

    $site_email = $config->get('mail');
    $forum_notification_email = $config->get('forum_notification_email');
    $form['forum_notification_recepient_fieldset']['forum_notification_email'] = [
      '#type' => 'textarea',
      '#title' => $this->t("Admin email for sending notification reports"),
      '#default_value' => isset($forum_notification_email) ? $forum_notification_email : $site_email,
      '#description' => $this->t('Add comma separated emails in case of multiple recipients. You can add maximum 50 emails.'),
    ];

    $form['forum_notification_recepient_fieldset']['forum_notification_email_or_markup']['#markup'] = '<strong>' . $this->t('OR') . '</strong>';

    // $roles_to_be_notified = ($config->get('forum_notification_roles_notified')) ?: [];
    // if (array_key_exists('anonymous', $user_roles)) {
    //   unset($user_roles['anonymous']);
    // }
    // $form['forum_notification_recepient_fieldset']['forum_notification_roles_notified'] = [
    //   '#type' => 'checkboxes',
    //   '#title' => $this->t('Select roles'),
    //   '#options' => $user_roles,
    //   '#default_value' => $roles_to_be_notified,
    //   '#description' => $this->t('Please select the roles to whom you want to send email, please remember to select roles in a way so that total user count should not be greater than 50.'),
    // ];

    $form['forum_notification_email_fieldset'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Email Settings'),
    ];

    // $form['forum_notification_email_fieldset']['forum_notification_email_subject'] = [
    //   '#type' => 'textfield',
    //   '#title' => $this->t('Configurable email subject'),
    //   '#default_value' => $config->get('forum_notification_email_subject'),
    //   '#description' => $this->t('Enter subject of the email.'),
    // ];

    // $form['forum_notification_email_fieldset']['forum_notification_email_body'] = [
    //   '#type' => 'textarea',
    //   '#title' => $this->t('Configurable email body'),
    //   '#default_value' => $config->get('forum_notification_email_body'),
    //   '#description' => $this->t('Email body for the email. Use the following tokens: @user_who_posted, @content_link, @content_title, @content_type, @action (posted or updated, will update accrodingly).'),
    // ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * Get Editable config names.
   *
   * @inheritDoc
   */
  protected function getEditableConfigNames() {
    return ['forum_notification.settings'];
  }

  /**
   * Add validate handler.
   *
   * @inheritDoc
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $user_input_values = $form_state->getUserInput();
    if (!empty($user_input_values['forum_notification_email'])) {
      $forum_notification_email = explode(',', $user_input_values['forum_notification_email']);
      if (count($forum_notification_email) > 50) {
        $form_state->setErrorByName('forum_notification_email', $this->t('Email Ids should be less than 50.'));
      }
      foreach ($forum_notification_email as $email) {
        if (!\Drupal::service('email.validator')->isValid(trim($email))) {
          $form_state->setErrorByName('forum_notification_email', $this->t('Some Email Ids are not valid, please add all email ids in a valid format.'));
          break;
        }
      }
    }
    else {
      $roles_notified = array_keys(array_filter($user_input_values['forum_notification_roles_notified']));
      if (count($roles_notified)) {
        $ids = $this->ForumNotificationService->getUsersOfRoles($roles_notified);
        if (count($ids) > 50) {
          $form_state->setErrorByName('forum_notification_roles_notified', $this->t('User count for the Recipients should be less than 50.'));
        }
      }
    }
  }

  /**
   * Add submit handler.
   *
   * @inheritDoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $user_input_values = $form_state->getUserInput();
    $config = $this->configFactory->getEditable('forum_notification.settings');
    // $config->set('forum_notification_node_types', $user_input_values['forum_notification_node_types']);
    // $config->set('forum_notification_trigger_on_node_update', $user_input_values['forum_notification_trigger_on_node_update']);
    // $config->set('forum_notification_trigger_on_node_status', $user_input_values['forum_notification_trigger_on_node_status']);
    // $config->set('forum_notification_allowed_roles', $user_input_values['forum_notification_allowed_roles']);
    $config->set('forum_notification_email', $user_input_values['forum_notification_email']);
    // $config->set('forum_notification_roles_notified', $user_input_values['forum_notification_roles_notified']);
    // $config->set('forum_notification_email_subject', $user_input_values['forum_notification_email_subject']);
    // $config->set('forum_notification_email_body', $user_input_values['forum_notification_email_body']);
    $config->save();
    parent::submitForm($form, $form_state);
  }

}
