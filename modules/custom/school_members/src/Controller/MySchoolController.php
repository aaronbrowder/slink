<?php

namespace Drupal\school_members\Controller;

use Drupal\user\Entity\User;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MySchoolController extends ControllerBase {

    public function content() {
        // redirect to current user's school, if there is one
        $user = User::load(\Drupal::currentUser()->id());
        $school = $user->get('field_school')->entity;
        if ($school != NULL) {
            return new RedirectResponse('/node/' . $school->id());   
        }
        // if the current user doesn't have an associated school, redirect to the home page
        return $this->redirect('<front>');
    }

}