<?php
namespace drupal\podtalk\Controller;
use Drupal\Core\Controller\ControllerBase;

/**
 * Celui ci c'est le controlleur de liste de recette
 */

class recetteController extends ControllerBase{
  public function recetteList(){
    $recettes = [
      ['name' => 'Tagine'],
      ['name' => 'Couscous'],
      ['name' => 'Tanjia'],
      ['name' => 'Rfissa'],
      ['name' => 'saffa'],
      ['name' => 'Chiwaa'],
      ['name' => 'Bastila'],
    ];

    /* $ourrecettes = '';
    foreach ($recettes as $recette){
      $ourrecettes .='<li>'. $recette['name'].'</li>';
    }*/

    return [
      '#theme' => 'recettes-liste',
      '#items'=> $recettes,
      '#title' => $this->t('Nos meilleures recetes du Maroc')
    ];
  }
}
