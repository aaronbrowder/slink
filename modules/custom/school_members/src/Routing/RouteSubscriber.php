<?php

namespace Drupal\school_members\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  public function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('user.admin_create')) {
      $perm = $route->getRequirement('_permission') . '+create users';
      $route->setRequirement('_permission', $perm);
    }
  }
}
