<?php

namespace Drupal\demo_baggage\Plugin\Block;
use Drupal\Core\Block\BlockBase;


/**
 * Provides a block called "exemple CopyRightBlock".
 *
 * @Block(
 *   id= "demo_baggage_CopyRightBlock",
 *   admin_label =@Translation ("CopyRight Block")
 * )
 */

class CopyRightBlock extends BlockBase{

  /**
   * {@inheritdoc}
   */
  public function build(){
    $date = new \DateTime();
    return array(
      '#markup' => t('Copyright @year &copy; Mkharbech salah eddine', [
        '@year' => $date->format('Y'),
      ]),
    );
  }
}
