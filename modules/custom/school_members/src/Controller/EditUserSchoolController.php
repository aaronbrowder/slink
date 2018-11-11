<?php

namespace Drupal\school_members\Controller;

use Drupal\user\Entity\User;
use Drupal\Core\Controller\ControllerBase;

class EditUserSchoolController extends ControllerBase {

  public function title(User $user = NULL) {
    return 'Change ' . $user->getDisplayName() . '\'s School';
  }

}
