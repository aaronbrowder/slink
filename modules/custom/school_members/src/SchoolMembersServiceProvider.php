<?php

namespace Drupal\school_members;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

class SchoolMembersServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    // alter the service "access_check.user.register" to use my custom class
    $definition = $container->getDefinition('access_check.user.register');
    $definition->setClass('Drupal\school_members\Access\RegisterAccessCheck');
  }
}