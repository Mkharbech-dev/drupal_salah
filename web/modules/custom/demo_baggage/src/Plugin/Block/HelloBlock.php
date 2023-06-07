<?php
namespace Drupal\demo_baggage\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
/**
 * Provides a block called "exemple Hello block".
 *
 * @Block(
 *   id= "demo_baggage_HelloBlock",
 *   admin_label =@Translation ("Hello block")
 * )
 */
class HelloBlock extends BlockBase{

      /**
       * {@inheritdoc}
       */
      public function build(){
        return array(
          '#markup' => 'Bonjour '.$this->configuration['block_firstname'].' ici c\'est le block HelloBlock',
        );
      }

      /**
      * {@inheritdoc}
      */
        public function blockForm($form, FormStateInterface $form_state) {
        $form['block_configuration'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Firstname'),
        '#description' => $this->t('Enter your Firstname'),
        '#default_value' => $this->configuration['block_firstname'],
        ];

        return $form;
      }

      public function defaultConfiguration() {
        return [
          'block_firstname' => $this->t('world'),
        ];
      }

      public function blockSubmit($form, FormStateInterface $form_state) {
        $values = $form_state->getValues();
        $this->configuration['block_firstname'] = $values['block_configuration'];
      }
}
