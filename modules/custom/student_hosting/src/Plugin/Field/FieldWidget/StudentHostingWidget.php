<?php

namespace Drupal\student_hosting\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;

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
class StudentHostingWidget extends WidgetBase {
  
  /**
   * Gets the initial values for the widget.
   *
   * @return array
   *   The initial values, keyed by property.
   */
  protected function getInitialValues() {
    $initial_values = [
      'enable_student_hosting' => FALSE,
    ];
    return $initial_values;
  }
  
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $item = $items[$delta];
    $value = $item->getEntity()->isNew() ? $this->getInitialValues() : $item->toArray();
    
    $element += [
      '#type' => 'details',
      '#collapsible' => TRUE,
      '#open' => TRUE,
    ];
    $element['student_hosting'] = [
      '#type' => 'student_hosting',
      '#default_value' => $value,
      '#required' => $this->fieldDefinition->isRequired()
    ];

    return $element;
  }
  
}