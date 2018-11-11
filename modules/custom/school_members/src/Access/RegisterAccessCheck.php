<?php

namespace Drupal\school_members\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Access check for user registration routes.
 */
class RegisterAccessCheck implements AccessInterface {

  /**
   * Checks access.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The currently logged in account.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  public function access(AccountInterface $account) {
    $user_settings = \Drupal::config('user.settings');
    // We never want users to be able to access the user register page.
    // Users can only be registered by admins.
    return AccessResult::forbidden();
  }

}
