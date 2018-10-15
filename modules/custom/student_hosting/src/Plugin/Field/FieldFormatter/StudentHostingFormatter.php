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

    $isWage = $this->getSetting('cost_type') == 'wages';
    
    $schoolName = 'School';
    $node = \Drupal::routeMatch()->getParameter('node');
    if ($node instanceof \Drupal\node\NodeInterface) {
      $schoolName = $node->getTitle();
    }

    foreach ($items as $delta => $item) {
      if ($item->enabled) {
        $elements[$delta] = [
          '#theme' => 'student_hosting_formatter',
          '#title' => $this->getSetting('title'),
          '#description' => $this->getSetting('description'),
          '#isWage' => $isWage,
          '#wage' => $isWage ? $item->cost : 0,
          '#fee' => $isWage ? 0 : $item->cost,
          '#currency' => $item->currency,
          '#program_parameters' => $item->description,
          '#school_name' => $schoolName
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
      'title' => 'Student Hosting',
      'cost_type' => 'Fees',
      'description' => 'Student hosting is awesome!',
    ] + parent::defaultSettings();
  }
  
  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    
    $output['title'] = [
      '#title' => t('Title'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('title'),
      '#attributes' => [
        'size' => 32
      ]
    ];
    
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