<?php

namespace Drupal\student_hosting\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\NodeInterface;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Drupal\file\Entity\File;
use Drupal\student_hosting\Plugin\Field\FieldFormatter\StudentHostingFormatter;

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

    $form_state->setFormState([
      'nid' => $node->id(),
      'field' => $field,
    ]);
    
    $item = $node->get($field);
    $school_name = $node->getTitle();
    $field_name = $item->getFieldDefinition()->getName();
    $field_label = $item->getFieldDefinition()->getLabel();
    
    $form['description'] = [
      '#theme' => 'student_hosting_formatter',
      '#title' => t($field_label),
      '#field_name' => $field_name,
      '#cost' => $item->cost,
      '#currency' => $item->currency,
      '#has_eligibility_requirements' => $item->min_age > 0 || $item->min_years_enrolled > 0,
      '#min_age' => $item->min_age,
      '#min_years_enrolled' => $item->min_years_enrolled,
      '#expectations' => t($item->expectations),
      '#has_expectations' => !empty($item->expectations),
      '#school_name' => $school_name
    ];
    
    if ($item->require_jc_record || $item->require_sm_approval || $item->require_sm_approval) {
      
      $form['documents'] = [
        '#type' => 'details',
        '#title' => 'Required Documents',
        '#open' => TRUE
      ];
      
      $form['documents']['description']['#markup'] = t('Please upload the following documents:'); 
      
      if ($item->require_jc_record) {
        $form['documents']['jc_record'] = [
          '#type' => 'managed_file',
          '#title' => t('JC Record'),
          '#description' => t(StudentHostingFormatter::JC_RECORD_DOCUMENT_DESCRIPTION),
          '#upload_location' => 'public://application_files',
          '#upload_validators' => [ 'file_validate_extensions' => ['pdf doc docx odt rtf jpg jpeg png gif']],
          '#required' => TRUE
        ]; 
      }
      
      if ($item->require_sm_approval) {
        $form['documents']['sm_approval'] = [
          '#type' => 'managed_file',
          '#title' => t('School Meeting Approval'),
          '#description' => t(StudentHostingFormatter::SM_APPROVAL_DOCUMENT_DESCRIPTION),
          '#upload_location' => 'public://application_files',
          '#upload_validators' => [ 'file_validate_extensions' => ['pdf doc docx odt rtf jpg jpeg png gif']],
          '#required' => TRUE
        ]; 
      }
      
      if ($item->require_recommendation_letter) {
        $form['documents']['recommendation_letter'] = [
          '#type' => 'managed_file',
          '#title' => t('Recommendation Letter'),
          '#description' => t(StudentHostingFormatter::RECOMMENDATION_LETTER_DOCUMENT_DESCRIPTION),
          '#upload_location' => 'public://application_files',
          '#upload_validators' => [ 'file_validate_extensions' => ['pdf doc docx odt rtf jpg jpeg png gif']],
          '#required' => TRUE
        ]; 
      }
    }
    
    $form['questionnaire'] = [
        '#type' => 'details',
        '#title' => 'Questionnaire',
        '#open' => TRUE
      ];
      
    $form['questionnaire']['description']['#markup'] = t('Please answer the following questions:'); 
    
    $questions = array_filter(explode("\n", $item->questions));
    foreach ($questions as $question_id => $question) {
      $form['questionnaire']['question_' . $question_id] = [
        '#type' => 'textfield',
        '#title' => t($question),
        '#required' => TRUE,
        '#attributes' => [ 'size' => 100 ]
      ];
    }

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
      '#attributes' => [
        'class' => [ 'slink-button-primary' ]
      ]
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
    // $title = $form_state->getValue('title');
    // if (strlen($title) < 5) {
    //   // Set an error for the form element with a key of "title".
    //   $form_state->setErrorByName('title', $this->t('The title must be at least 5 characters long.'));
    // }
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
    
    $nid = $form_state->get('nid');
    $field = $form_state->get('field');
    
    $school = Node::load($nid);
    $item = $school->get($field);
    $program_title = $item->getFieldDefinition()->getLabel();
    $applicant = User::load(\Drupal::currentUser()->id());
    
    $questionnaire = '';
    $questions = array_filter(explode("\n", $item->questions));
    for ($i = 0; $i < sizeof($questions); $i++) {
      $questionnaire .= '<strong>' . $questions[$i] . '</strong>';
      $questionnaire .= '<p>' . $form_state->getValue('question_' . $i) . '</p>';
    }
    
    $application = Node::create([
      'type' => 'student_hosting_application',
      'title' => $program_title . t(' Application '),
      'field_applicant' => $applicant,
      'field_recipient_school' => $school,
      'field_jc_record' => [ 'target_id' => self::upload_file($form_state, 'jc_record') ],
      'field_sm_approval' => [ 'target_id' => self::upload_file($form_state, 'sm_approval') ],
      'field_recommendation_letter' => [ 'target_id' => self::upload_file($form_state, 'recommendation_letter') ],
      'field_questionnaire' => [ 'format' => 'basic_html', 'value' => $questionnaire ]
    ]);
    
    $application->save();
    
    $form_state->setRedirect('student_hosting.application_confirmation', [ 'node' => $application->id() ]);
  }

  private function upload_file(FormStateInterface $form_state, $form_field_name) {
    $form_file = $form_state->getValue($form_field_name, 0);
    if (isset($form_file[0]) && !empty($form_file[0])) {
      $file = File::load($form_file[0]);
      $file->setPermanent();
      $file->save();
      return $file->id();
    }
    return NULL;
  }

}
