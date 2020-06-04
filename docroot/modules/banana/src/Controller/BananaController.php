<?php

namespace Drupal\banana\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use mysql_xdevapi\Exception;

/**
 * Returns responses for banana routes.
 */
class BananaController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    $query = \Drupal::entityQuery('node')
      ->condition('status', 1)
      ->condition('type', 'programa');
    $nids = $query->execute();
    $count_es = 0;
    $count_en = 0;

    $programs = Node::loadMultiple($nids);
    foreach ($programs as $program) {

      if(!empty($program->getTranslation('en'))) {
        $categories_es = $program->get('field_categoria')->referencedEntities();
        print $program->id() . "--" . $program->get('langcode')->value . "<br>";
        $categories_es_to_set = [];
        foreach ($categories_es as $categorie) {
          print $categorie->id() . "<br>";
          $categories_es_to_set[] = [
            'target_id' => $categorie->id()
          ];
        }
        //var_dump($categories_es_to_set);

        $translation = $program->getTranslation('en');
        $translation->set('field_categoria', $categories_es_to_set);
        $translation->save();

        print "--en<br>";

        //$entity->set('field_meldungstyp', ['target_id' => 19]);

        $categories_en = $translation->get('field_categoria')->referencedEntities();
        foreach ($categories_en as $categorie) {
          print $categorie->id() . "<br>";
        }


        //print $translation->id() . "--" . $translation->get('langcode')->value . "<br>";
      }
      else {
        //print "ID node de 'Programa' sin traducción al ingles:" . $program->id() . "<br>";
      }

      Print "====================<br>";

    }

    return $build;
  }

}
