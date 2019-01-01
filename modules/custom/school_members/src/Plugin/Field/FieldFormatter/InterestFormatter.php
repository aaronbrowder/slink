<?php

namespace Drupal\school_members\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceFormatterBase;

/**
 * Plugin implementation of the 'interest' formatter.
 *
 * @FieldFormatter(
 *   id = "interest",
 *   label = @Translation("Interest"),
 *   field_types = {
 *     "entity_reference"
 *   }
 * )
 */
class InterestFormatter extends EntityReferenceFormatterBase { 
    
  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    foreach ($this->getEntitiesToView($items, $langcode) as $delta => $entity) {
      $label = $entity->label();
      $url = '/interests/' . $entity->id();
      $elements[$delta] = [
          '#markup' => '<a href="' . $url . '">' . $label . '</a>'
        ];
    }
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public static function isApplicable(FieldDefinitionInterface $field_definition) {
    // This formatter is only available for taxonomy terms.
    return $field_definition->getFieldStorageDefinition()->getSetting('target_type') == 'taxonomy_term';
  }
}