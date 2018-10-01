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
 *   default_widget = "student_hosting_widget",
 *   default_formatter = "student_hosting_formatter"
 * )
 */
class StudentHostingItem extends FieldItemBase implements FieldItemInterface {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'enable_student_hosting' => [
          'type' => 'bit',
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = [];
    $properties['enable_student_hosting'] = DataDefinition::create('boolean')
      ->setLabel(t('Turn this on if your school is open to hosting students from other schools. You can set requirements, including fees, for students who wish to visit.'));
  
    return $properties;
  }
  
  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('enable_student_hosting')->getValue();
    return $value === NULL || $value === FALSE;
  }

}