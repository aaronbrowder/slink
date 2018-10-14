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
    
    $isGuest = $this->getSetting('type') === 'guest';
    
    $enablerTerm = $isGuest ? t('Allow Student Guests') : t('Allow Student Ambassadors');
    $enablerDescription = $isGuest
      ? t('Turn this on if you are open to hosting students from other schools in exchange for a fee.')
      : t('Turn this on if you are open to hosting student ambassadors. An ambassador is an experienced student from another school who will perform duties and/or help build your culture in exchange for wages.');
    
    $costTerm = $isGuest ? t('Weekly Fee') : t('Weekly Wage');
    $costDescription = $isGuest
      ? t('This is the weekly fee that must be paid to the host school by the sending family or sending school.')
      : t('This is the weekly wage that will be paid to the student ambassador.');
    
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
      '#default_value' => isset($item->cost) ? $item->cost : '',
      '#states' => $states,
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
      '#default_value' => isset($item->currency) ? $item->currency : '',
      '#states' => $states,
      '#attributes' => [
        'size' => 8
      ]
    ];
    $element['description'] = [
      '#type' => 'text_format',
      '#allowed_formats' => [
        'full_html'
      ],
      '#title' => t('Program Parameters and Application Instructions'),
      '#default_value' => isset($item->description) ? $item->description : '',
      '#states' => $states,
    ];

    return $element;
  }
  
  /**
   * {@inheritdoc}
   */
  public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
    foreach ($values as &$value) {
      if (count($value['description'])) {
        $value['description'] = $value['description']['value'];
      } else {
        $value['description'] = $value['description'] !== '' ? $value['description'] : '0';
      }
    }
    return $values;
  }
  
  public static function defaultSettings() {
    return [
      'type' => 'guest',
    ] + parent::defaultSettings();
  }
  
  public function settingsForm(array $form, FormStateInterface $form_state) {
    
    $output['type'] = array(
      '#title' => t('Type'),
      '#type' => 'select',
      '#options' => [
        'guest' => t('Guest'),
        'ambassador' => t('Ambassador'),
      ],
      '#default_value' => $this->getSetting('type'),
    );
  
    return $output;
  }
  
}