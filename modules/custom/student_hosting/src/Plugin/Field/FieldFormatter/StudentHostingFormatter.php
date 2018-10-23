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
    
  const JC_RECORD_DOCUMENT_DESCRIPTION = 'Your JC record for the current year. Obtain this from an official representative, such as your JC Clerk. The document should be signed by the official representative.';
  const SM_APPROVAL_DOCUMENT_DESCRIPTION = 'A document, signed by your School Meeting Clerk or other official representative, stating that you have received approval from your School Meeting to be a guest at our school.';
  const RECOMMENDATION_LETTER_DOCUMENT_DESCRIPTION = 'A letter of recommendation written by a staff member at your school. This letter should explain why the staff member thinks you will be a pleasant and worthwhile addition to our school.';
    
  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    $school_name = 'School';
    $school_node_id = 0;
    $node = \Drupal::routeMatch()->getParameter('node');
    if ($node instanceof \Drupal\node\NodeInterface) {
      $school_name = $node->getTitle();
      $school_node_id = $node->id();
    }
    
    $field_name = $this->fieldDefinition->getName();
    $field_label = $this->fieldDefinition->getLabel();

    foreach ($items as $delta => $item) {
      if ($item->enabled) {
        $elements[$delta] = [
          '#theme' => 'student_hosting_formatter',
          '#use_container' => TRUE,
          '#use_apply_button' => TRUE,
          '#field_name' => $field_name,
          '#title' => t($field_label),
          '#cost' => $item->cost,
          '#currency' => $item->currency,
          '#has_eligibility_requirements' => $item->min_age > 0 || $item->min_years_enrolled > 0,
          '#min_age' => $item->min_age,
          '#min_years_enrolled' => $item->min_years_enrolled,
          '#expectations' => t($item->expectations),
          '#has_expectations' => !empty($item->expectations),
          '#school_name' => $school_name,
          '#school_node_id' => $school_node_id,
          '#require_jc_record' => $item->require_jc_record,
          '#require_sm_approval' => $item->require_sm_approval,
          '#require_recommendation_letter' => $item->require_recommendation_letter,
          '#has_required_documents' => $item->require_jc_record || $item->require_sm_approval || $item->require_recommendation_letter,
          '#jc_record_document_description' => t(self::JC_RECORD_DOCUMENT_DESCRIPTION),
          '#sm_approval_document_description' => t(self::SM_APPROVAL_DOCUMENT_DESCRIPTION),
          '#recommendation_letter_document_description' => t(self::RECOMMENDATION_LETTER_DOCUMENT_DESCRIPTION)
        ];
      }
    }
    return $elements;
  }
  
}