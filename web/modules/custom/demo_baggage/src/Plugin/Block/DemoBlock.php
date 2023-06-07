<?php
namespace Drupal\demo_baggage\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a block called "exemple Demo block".
 *
 * @Block(
 *   id= "demo_baggage_DemoBlock",
 *   admin_label =@Translation ("Démo block")
 * )
 */

class DemoBlock extends BlockBase{

  /**
   * {@inheritdoc}
   */
  public function build(){
    return array(
      '#markup' => 'Hello World Again',
    );
  }
}
