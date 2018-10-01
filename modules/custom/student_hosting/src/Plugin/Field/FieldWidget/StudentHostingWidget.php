<?php

namespace Drupal\student_hosting\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;


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
class AddressDefaultWidget extends WidgetBase implements ContainerFactoryPluginInterface {
}