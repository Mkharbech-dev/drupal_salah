<?php
namespace Drupal\demo_baggage\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

class salahController extends ControllerBase{
    public function bienvenue(){
    $name= 'salah eddine';
    $phrase = 'bienvenue chez Drupal 9';
    return [
        '#theme' => 'bienvenue',
        '#nom' => $name,
        '#items'=> $phrase,
        '#title' => $this->t('Bienvenue chez salahController')
      ];
    }

  public function requests() {
    //Requete pour récupérer les id des contenus, d'utilisateurs, & des cpmmentaires si on en a.
    $query = \Drupal::entityQuery('node');
    $nids = $query->execute();

    $query = \Drupal::entityQuery('user');
    $uids = $query->execute();

    $query = \Drupal::entityQuery('comment');
    $cids = $query->execute();
    //dsm($nids);

    // Fitrage par type de contenu
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'article');
    $filtred_article_nids = $query->execute();

    $query = \Drupal::entityQuery('node')
      ->condition('type', 'topic');
    $filtred_topic_nids = $query->execute();

    // Fitrage par titre
    $query = \Drupal::entityQuery('node')
      ->condition('uid', '1');
    $filtred_admin_nids = $query->execute();

    //Affichage des résultats
    $markup = 'contenu qui a id n°:' . implode(', ',$nids );
    $markup .= '</br> utilisateur qui a id n°:' . implode(', ',$uids );
    $markup .= '</br> commentaire qui a id n°:' . implode(', ',$cids );

    $markup .= '</br><br><b>filtrage par type de contenu:</b><br>';
    $markup .= '</br> l\'id qui a le contenu de type topic:' . implode(', ',$filtred_topic_nids );
    $markup .= '</br> l\'id qui a le contenu de type article de base:' . implode(', ',$filtred_article_nids );
    $markup .= '</br> les ids des contenus dont le user est Admin:' . implode(', ',$filtred_admin_nids );

    //$node = Node::load(reset( $filtred_topic_nids));
    //$markup .= '<br><br>';
    //$markup .= '</br> le corps du contenu qui a le titre Fitness est :' . $node->field_image_topic->getValue();

    $build = array(
      '#type' => 'markup',
      '#markup' => $markup,
    );
    return $build;
  }
}
