<?php
function podtalk_form_system_theme_settings_alter(&$form, \Drupal\Core\Form\FormStateInterface $form_state) {

// Add a checkbox to toggle the breadcrumb trail.
  $form['podtalk_settings'] = [
  '#type' => 'fieldset',
  '#title' => t('paramétres pérsonnalisées'),
  '#collapsible' => false,
  '#collapsed' => false,
  ];
  $form['podtalk_settings']['site_copy'] = [
    '#type' => 'textfield',
    '#title' => t('copyright du site'),
    '#default_value' => podtalk_get_setting('site_copy'),
    '#description' => t('Entrez le copyright du site'),
  ];
}
