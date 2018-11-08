<?php

namespace Drupal\school_members\EventSubscriber;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event subscriber subscribing to KernelEvents::REQUEST.
 */
class RedirectAnonymousSubscriber implements EventSubscriberInterface {

  public function __construct() {
    $this->account = \Drupal::currentUser();
  }

  public function checkAuthStatus(GetResponseEvent $event) {

    if ($this->account->isAnonymous()) {
      
      $route_name = \Drupal::routeMatch()->getRouteName();
      
      if ($route_name == 'user.login' || $route_name == 'contact.site_page' ||
        (strpos($route_name, 'view') === 0 && strpos($route_name, 'rest_') !== FALSE)) {
        return;
      }

      $response = new RedirectResponse('/contact', 302);
      $response->send();
      exit(0);
    }
  }

  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = array('checkAuthStatus');
    return $events;
  }

}