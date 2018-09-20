<?php

namespace Drupal\hello_world\Controller;

class HelloController {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello, World!'),
    );
  }
}