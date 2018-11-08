<?php

namespace Drupal\student_hosting\Form;

use Drupal\Core\Controller\ControllerBase;

class ConfirmationController extends ControllerBase {

  public function content() {
    $build = [
      '#markup' => $this->t('Thank you! Your application has been submitted.'),
    ];
    return $build;
  }

}