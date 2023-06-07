<?php

namespace Drupal\demo_baggage\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ContactForm extends FormBase {

  public function getFormId()
  {
    return 'demo_baggage_contact_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['nom'] = array(
      '#type' => 'textfield',
      '#title' => $this
        ->t('Nom'),
      '#maxlength' => '255',
      '#default_value' => '',
      '#required' => 'True',
    );

    $form['contact_title'] = array(
      '#type' => 'textfield',
      '#title' => $this
        ->t('Titre'),
      '#maxlength' => '255',
      '#default_value' => '',
      '#required' => 'FALSE',
    );
    $form['contact_email'] = array(
      '#type' => 'email',
      '#title' => $this
        ->t('Email'),
      '#default_value' => '',
      '#required' => 'FALSE',
    );
    $form['contact_message'] = array(
      '#type' => 'textarea',
      '#title' => $this
        ->t('Votre message'),
      '#description' => $this->t('Please add "Drupal" in your message'),
      '#default_value' => '',
      '#required' => 'TRUE',
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Valider'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    //foreach ($form_state->getValues() as $key => $value) {
      //\Drupal::messenger()->addStatus($key . ': ' . $value);
    //}

    //dsm($form_state->getValues());
    $email_value = $form_state->getValue('contact_email');
    $nom = $form_state->getValue('nom');
    $msg = $nom.' votre message a bien été envoyé à: '.$email_value;
    \Drupal::messenger()->addStatus($msg);
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    $msg_value = $form_state->getValue('contact_message');
    if (!str_contains($msg_value, 'Drupal')){
      $form_state->setErrorByName('contact_message', 'Le texte doit contenir le mot Drupal svp ...');
    }
  }
}
