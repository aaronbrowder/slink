<?php

namespace Drupal\student_hosting\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'student_hosting' formatter.
 *
 * @FieldFormatter(
 *   id = "student_hosting",
 *   label = @Translation("Student Hosting"),
 *   field_types = {
 *     "student_hosting"
 *   }
 * )
 */
class StudentHostingFormatter extends FormatterBase {
    
    /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    $is_wage = $this->getSetting('cost_type') == 'wages';
    
    $school_name = 'School';
    $school_node_id = 0;
    $node = \Drupal::routeMatch()->getParameter('node');
    if ($node instanceof \Drupal\node\NodeInterface) {
      $school_name = $node->getTitle();
      $school_node_id = $node->id();
    }
    
    $field_definition = $this->fieldDefinition->getItemDefinition()->getFieldDefinition();
    $field_name = $field_definition->getName();
    $field_label = $field_definition->getLabel();

    foreach ($items as $delta => $item) {
      if ($item->enabled) {
        $elements[$delta] = [
          '#theme' => 'student_hosting_formatter',
          '#title' => t($field_label),
          '#description' => t($this->getSetting('description')),
          '#isWage' => $is_wage,
          '#wage' => $is_wage ? $item->cost : 0,
          '#fee' => $is_wage ? 0 : $item->cost,
          '#currency' => $item->currency,
          '#has_eligibility_requirements' => $item->min_age > 0 || $item->min_years_enrolled > 0,
          '#min_age' => $item->min_age,
          '#min_years_enrolled' => $item->min_years_enrolled,
          '#program_parameters' => t($item->description),
          '#school_name' => $school_name,
          '#school_node_id' => $school_node_id,
          '#student_hosting_field_name' => t($field_name)
        ];
      }
    }
    return $elements;
  }
  
  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'cost_type' => 'Fees',
      'description' => 'Student hosting is awesome!',
    ] + parent::defaultSettings();
  }
  
  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    
    $output['cost_type'] = [
      '#title' => t('Cost Type'),
      '#type' => 'select',
      '#options' => [
        'fees' => t('Fees'),
        'wages' => t('Wages'),
      ],
      '#default_value' => $this->getSetting('description'),
    ];
    
    $output['description'] = [
      '#title' => t('Description'),
      '#type' => 'textarea',
      '#default_value' => $this->getSetting('description'),
    ];
  
    return $output;
  }
  
}