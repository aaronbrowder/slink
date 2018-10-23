<?php

namespace Drupal\student_hosting\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'student_hosting' widget.
 *
 * @FieldWidget(
 *   id = "student_hosting",
 *   label = @Translation("Student Hosting"),
 *   field_types = {
 *     "student_hosting"
 *   },
 * )
 */
class StudentHostingWidget extends WidgetBase  {
  
  /**
   * Gets the initial values for the widget.
   *
   * @return array
   *   The initial values, keyed by property.
   */
  protected function getInitialValues() {
    $initial_values = [
      'enabled' => FALSE
    ];
    return $initial_values;
  }
  
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $item = $items[$delta];
    $value = $item->getEntity()->isNew() ? $this->getInitialValues() : $item->toArray();
    
    $enablerTerm = $this->getSetting('enabler_term');
    $enablerDescription = $this->getSetting('enabler_description');
    $costTerm = $this->getSetting('cost_term');;
    $costDescription = $this->getSetting('cost_description');
    
    $enablerId = str_replace(' ', '-', $element['#title']) . '-enabler';
    
    $states = [
      'visible' => [
        '#' . $enablerId => ['checked' => TRUE]
      ]
    ];
    
    $element += [
      '#type' => 'details',
      '#collapsible' => TRUE,
      '#open' => TRUE,
    ];
    $element['enabled'] = [
      '#type' => 'checkbox',
      '#title' => $enablerTerm,
      '#description' => $enablerDescription,
      '#id' => $enablerId,
      '#default_value' => isset($item->enabled) ? $item->enabled : '',
    ];
    $element['cost'] = [
      '#type' => 'textfield',
      '#title' => $costTerm,
      '#description' => $costDescription,
      '#default_value' => isset($item->cost) ? $item->cost : 0,
      '#states' => $states,
      '#required' => TRUE,
      '#attributes' => [
        ' type' => 'number', // insert space before attribute name
        'step' => .01,
        'min' => 0,
        'max' => 9999.99
      ]
    ];
    $element['currency'] = [
      '#type' => 'textfield',
      '#title' => t('Currency'),
      '#description' => t('The type of currency for the above amount, for example "USD".'),
      '#default_value' => isset($item->currency) ? $item->currency : 'USD',
      '#states' => $states,
      '#required' => TRUE,
      '#attributes' => [
        'size' => 8
      ]
    ];
    $element['min_age'] = [
      '#type' => 'textfield',
      '#title' => t('Minimum Age'),
      '#description' => t('The minimum age for a student to be eligible for the program.'),
      '#default_value' => isset($item->min_age) ? $item->min_age : 0,
      '#states' => $states,
      '#required' => TRUE,
      '#attributes' => [
        ' type' => 'number', // insert space before attribute name
        'min' => 0,
        'max' => 99
      ]
    ];
    $element['min_years_enrolled'] = [
      '#type' => 'textfield',
      '#title' => t('Minimum Years Enrolled'),
      '#description' => t('The minimum number of years a student must have been enrolled in their home school in order to be eligible for the program.'),
      '#default_value' => isset($item->min_years_enrolled) ? $item->min_years_enrolled : 0,
      '#states' => $states,
      '#required' => TRUE,
      '#attributes' => [
        ' type' => 'number', // insert space before attribute name
        'min' => 0,
        'max' => 99
      ]
    ];
    $element['require_jc_record'] = [
      '#type' => 'checkbox',
      '#title' => t('Require JC Record'),
      '#description' => t('Turn this on to require applicants to submit their JC record for the current year.'),
      '#default_value' => isset($item->require_jc_record) ? $item->require_jc_record : '',
      '#states' => $states,
    ];
    $element['require_sm_approval'] = [
      '#type' => 'checkbox',
      '#title' => t('Require School Meeting Approval'),
      '#description' => t('Turn this on to require applicants get approval from their School Meeting before applying.'),
      '#default_value' => isset($item->require_sm_approval) ? $item->require_sm_approval : '',
      '#states' => $states,
    ];
    $element['require_recommendation_letter'] = [
      '#type' => 'checkbox',
      '#title' => t('Require Recommendation Letter'),
      '#description' => t('Turn this on to require applicants to submit a letter of recommendation from a staff member.'),
      '#default_value' => isset($item->require_recommendation_letter) ? $item->require_recommendation_letter : '',
      '#states' => $states,
    ];
    $element['expectations'] = [
      '#type' => 'textarea',
      '#title' => t('Expectations'),
      '#description' => t('Briefly describe the duties the student will be expected to perform, including things like democratic participation and role modeling.'),
      '#default_value' => isset($item->expectations) ? $item->expectations : '',
      '#states' => $states,
    ];
    $element['questions'] = [
      '#type' => 'textarea',
      '#title' => t('Questionnaire'),
      '#description' => t('List questions you would like the applicant to answer, one question per line.'),
      '#default_value' => isset($item->questions) ? $item->questions : '',
      '#states' => $states,
      '#required' => TRUE,
      '#attributes' => [
        'rows' => 12
      ]
    ];

    return $element;
  }
  
  /**
   * {@inheritdoc}
   */
  public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
    // foreach ($values as &$value) {
    //   if (count($value['description'])) {
    //     $value['description'] = $value['description']['value'];
    //   } else {
    //     $value['description'] = $value['description'] !== '' ? $value['description'] : '0';
    //   }
    // }
    return $values;
  }
  
  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'enabler_term' => 'Allow Student Hosting',
      'enabler_description' => 'Turn this on if you want to host students from other schools.',
      'cost_term' => 'Weekly Cost',
      'cost_description' => 'This is the weekly cost.',
    ] + parent::defaultSettings();
  }
  
  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    
    $output['enabler_term'] = [
      '#title' => t('Enabler Term'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('enabler_term'),
      '#attributes' => [
        'size' => 32
      ]
    ];
    
    $output['enabler_description'] = [
      '#title' => t('Enabler Description'),
      '#type' => 'textarea',
      '#default_value' => $this->getSetting('enabler_description'),
    ];
    
    $output['cost_term'] = [
      '#title' => t('Cost Term'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('cost_term'),
      '#attributes' => [
        'size' => 32
      ]
    ];
    
    $output['cost_description'] = [
      '#title' => t('Cost Description'),
      '#type' => 'textarea',
      '#default_value' => $this->getSetting('cost_description'),
    ];
  
    return $output;
  }
  
}