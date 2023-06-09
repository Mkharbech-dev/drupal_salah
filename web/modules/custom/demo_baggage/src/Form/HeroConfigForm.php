<?php

namespace Drupal\demo_baggage\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Our config form.
 */
class HeroConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return "module_hero_confighero";
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('demo_baggage.settings');

    $form['hero_list_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre de la liste des héros'),
      '#default_value' => $config->get('hero_list_title'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'demo_baggage.settings',
    ];
  }


}
