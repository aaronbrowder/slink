<?php

namespace Drupal\student_hosting\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use \Drupal\node\NodeInterface;

/**
 * Implements the ApplicationForm form controller.
 */
class ApplicationForm extends FormBase {

  /**
   * Build the application form.
   *
   * A build form method constructs an array that defines how markup and
   * other form elements are included in an HTML form.
   *
   * @param array $form
   *   Default form array structure.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Object containing current form state.
   *
   * @return array
   *   The render array defining the elements of the form.
   */
  public function buildForm(array $form, FormStateInterface $form_state, NodeInterface $node = NULL, $field = NULL) {

    $student_hosting = $node->get($field);
    $questionnaire = $student_hosting->questions;
    $questions = explode("\n", $questionnaire);
    
    foreach ($questions as $question_id => $question) {
      $form['question_' . $question_id] = [
        '#type' => 'textfield',
        '#title' => t($question),
        '#required' => FALSE,
        '#attributes' => [ 'size' => 100 ]
      ];
    }

    // $form['description'] = [
    //   '#type' => 'item',
    //   '#markup' => $this->t('This basic example shows a single text input element and a submit button'),
    // ];

    // $form['title'] = [
    //   '#type' => 'textfield',
    //   '#title' => $this->t('Title'),
    //   '#description' => $this->t('Title must be at least 5 characters in length.'),
    //   '#required' => TRUE,
    // ];

    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form. This is not required, but is convention.
    $form['actions'] = [
      '#type' => 'actions',
    ];

    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }
  
  public function title(NodeInterface $node = NULL, $field = NULL) {
    $school_name = $node->getTitle();
    $field_label = $node->get($field)->getFieldDefinition()->getLabel();
    return $school_name . ' · ' . $field_label . ' · Application';
  }

  /**
   * Getter method for Form ID.
   *
   * The form ID is used in implementations of hook_form_alter() to allow other
   * modules to alter the render array built by this form controller. It must be
   * unique site wide. It normally starts with the providing module's name.
   *
   * @return string
   *   The unique ID of the form defined by this class.
   */
  public function getFormId() {
    return 'student_hosting_application_form';
  }

  /**
   * Implements form validation.
   *
   * The validateForm method is the default method called to validate input on
   * a form.
   *
   * @param array $form
   *   The render array of the currently built form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Object describing the current state of the form.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $title = $form_state->getValue('title');
    if (strlen($title) < 5) {
      // Set an error for the form element with a key of "title".
      $form_state->setErrorByName('title', $this->t('The title must be at least 5 characters long.'));
    }
  }

  /**
   * Implements a form submit handler.
   *
   * The submitForm method is the default method called for any submit elements.
   *
   * @param array $form
   *   The render array of the currently built form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Object describing the current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    /*
     * This would normally be replaced by code that actually does something
     * with the title.
     */
    $title = $form_state->getValue('title');
    $this->messenger()->addMessage($this->t('You specified a title of %title.', ['%title' => $title]));
  }

}
