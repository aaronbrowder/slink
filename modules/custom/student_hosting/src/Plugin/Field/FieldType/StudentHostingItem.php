<?php

namespace Drupal\student_hosting\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'student_hosting' field type.
 *
 * @FieldType(
 *   id = "student_hosting",
 *   label = @Translation("Student Hosting"),
 *   category = @Translation("Student Hosting"),
 *   default_widget = "student_hosting",
 *   default_formatter = "student_hosting"
 * )
 */
class StudentHostingItem extends FieldItemBase implements FieldItemInterface {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'enabled' => [
          'type' => 'int',
          'size' => 'tiny',
          'not null' => TRUE
        ],
        'cost' => [
          'type' => 'numeric',
          'unsigned' => TRUE, 
          'precision' => 6,
          'scale' => 2,
          'not null' => FALSE
        ],
        'currency' => [
          'type' => 'varchar',
          'length' => 255
        ],
        'description' => [
          'type' => 'text'
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = [];
    
    $properties['enabled'] = DataDefinition::create('boolean');
    $properties['cost'] = DataDefinition::create('string');
    $properties['currency'] = DataDefinition::create('string');
    $properties['description'] = DataDefinition::create('string');
      
    return $properties;
  }
  
  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    // we don't want it to be considered empty when disabled because that will erase all data.
    //$value = $this->get('enabled')->getValue();
    //return $value == FALSE;
    return FALSE;
  }

}