<?php

namespace Drupal\student_hosting\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
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
class StudentHostingFormatter extends FormatterBase { }