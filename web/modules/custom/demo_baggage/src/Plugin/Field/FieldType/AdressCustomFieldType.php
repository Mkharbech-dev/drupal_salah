<?php

namespace Drupal\demo_baggage\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * @FieldType(
 *   id = "adress_custom_field_type",
 *   label = @Translation("Adresse compléte"),
 *   description = @Translation("Full adress Field Type."),
 * )
 */

class AdressCustomFieldType extends FieldItemBase {

  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = [];
    $properties['adress'] = DataDefinition::create('string')
      ->setLabel(t('Adress'));
    $properties['complement'] = DataDefinition::create('string')
      ->setLabel(t('Complement'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $columns = [];
    $columns['adress'] = [
      'type' => 'varchar',
      'length' => 255,
      'default'=> '0',
    ];
    $columns['complement'] = [
      'type' => 'varchar',
      'length' => 255,
      'default'=> '0',
    ];

      return [
        'columns' => $columns,
        'indexes' => [],
      ];
  }


}
