<?php

namespace Drupal\school_members\EventSubscriber;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Event subscriber subscribing to KernelEvents::REQUEST.
 */
class RedirectAnonymousSubscriber implements EventSubscriberInterface {

  public function __construct() {
    $this->account = \Drupal::currentUser();
  }

  public function checkAuthStatus(GetResponseEvent $event) {
    // 403 is the access denied page
    if ($this->account->isAnonymous() && \Drupal::routeMatch()->getRouteName() == 'system.403') {
      // before redirecting, store the current url so we can redirect back to it after login
      $current_path = \Drupal::service('path.current')->getPath();
      $tempstore = \Drupal::service('user.shared_tempstore')->get('school_members');
      $tempstore->set('redirect_path', $current_path);
      // 302 is a temporary redirect
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