<?php

namespace Drupal\forum_notification;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Url;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Mail\MailManagerInterface;
use Drupal\user\Entity\User;
use Drupal\Core\Utility\LinkGeneratorInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Logger\LoggerChannelTrait;

/**
 * ForumNotificationService implement helper service class.
 */
class ForumNotificationService {

  use StringTranslationTrait;
  use LoggerChannelTrait;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The current user account.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $account;

  /**
   * The mail manager instance.
   *
   * @var Drupal\Core\Mail\MailManager
   */
  protected $mailManager;

  /**
   * The link generator instance.
   *
   * @var Drupal\Core\Mail\MailManager
   */
  protected $linkGenerator;

  /**
   * Creates a verbose messenger.
   */
  public function __construct(ConfigFactoryInterface $config_factory, AccountInterface $account, MailManagerInterface $mailManager, LinkGeneratorInterface $linkGenerator) {
    $this->configFactory = $config_factory;
    $this->account = $account;
    $this->mailManager = $mailManager;
    $this->linkGenerator = $linkGenerator;
  }

  /**
   * Get settings of admin content notification.
   */
  public function getConfigs() {
    return $this->configFactory->get('forum_notification.settings');
  }

  /**
   * Get users of roles.
   *
   * @return array
   *   Array of User Uids.
   */
  public function getUsersOfRoles($roles) {
    $ids = \Drupal::entityQuery('user')
      ->condition('status', 1)
      ->condition('roles', $roles, 'IN')
      ->execute();
    return $ids;
  }

  /**
   * Check if current user allowed to send admin content notification.
   *
   * @return bool
   *   Return true if allowed to send admin content notification.
   */
  public function isCurrentUserRoleAllowedToSendNotification() {
    $roles = $this->account->getRoles();
    $trigger_for_roles = ($this->getConfigs()->get('forum_notification_allowed_roles')) ?: [];
    return count(array_intersect(array_filter($trigger_for_roles), $roles));
  }

  /**
   * Send Eamil.
   *
   * @param Drupal\Core\Entity\EntityInterface $node
   * @param bool $is_new
   */
  public function sendMail(EntityInterface $node, $is_new = FALSE) {
    global $base_url;
    $config = $this->getConfigs();
    $node_type = $node->getType();
    $node_type_label = $node->type->entity->label();
    if ($node_type == 'forum') {
      $user = $node->getOwner();
      $user_name = $user->getDisplayName();
      $url = Url::fromUri($base_url . '/node/' . $node->id());
      $link = $this->linkGenerator->generate('here', $url);
      $node_title = $node->label();
      $node_body = $node->body->value;
      $forum = $node->get('taxonomy_forums')->entity;
      $forum_name = $forum->getName();
      $params = [
        'subject' => "New Discussion Topic on Slink: $node_title",
        'body' => "$user_name posted a new topic in <em>$forum_name</em>.<h3>$node_title</h3>$node_body<p>View and reply to the topic $link.",
      ];
      $key = 'forum_notification_key';
      $ids = \Drupal::entityQuery('user')->condition('status', 1)->execute();
      $all_users = User::loadMultiple($ids);
      $func = function($value) {
        return $value['target_id'];
      };
      foreach ($all_users as $u) {
        $subscriptions = $u->get('field_forum_subscriptions')->getValue();
        $subscription_forum_ids = array_map($func, $subscriptions);
        if (in_array($forum->id(), $subscription_forum_ids)) {
          $this->mailManager->mail('forum_notification', $key, $u->getEmail(), 'en', $params, \Drupal::config('system.site')->get('mail'), TRUE);
        }
      }
      // send a notification report to admin
      // $admin_email = $config->get('forum_notification_email');
      // if (!empty($admin_email)) {
      //   $params = [
      //     'body' => 'The following emails were notified of new node ' . $node->id() . ': ' . $email,
      //     'subject' => 'Notification Report'
      //   ];
      //   $this->mailManager->mail('forum_notification', $key, $admin_email, 'en', $params, \Drupal::config('system.site')->get('mail'), TRUE);
      // }
    }
  }

}
