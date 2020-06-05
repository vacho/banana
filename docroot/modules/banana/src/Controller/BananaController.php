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
   * TagsSpanishToEnglish.
   */
  public function tagsSpanishToEnglish() {

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

  public function tagsD7ToD8() {
    // Switch to external database
    \Drupal\Core\Database\Database::setActiveConnection('external');

    $db = \Drupal\Core\Database\Database::getConnection();
    $category_ids = [
      ['id_d7' => 109, 'id_d8' => 319, 'nodes_d7' => []],
      ['id_d7' => 110, 'id_d8' => 320, 'nodes_d7' => []],
      ['id_d7' => 111, 'id_d8' => 318, 'nodes_d7' => []],
      ['id_d7' => 112, 'id_d8' => 322, 'nodes_d7' => []],
      ['id_d7' => 113, 'id_d8' => 321, 'nodes_d7' => []],
      ['id_d7' => 114, 'id_d8' => 307, 'nodes_d7' => []],
      ['id_d7' => 115, 'id_d8' => 308, 'nodes_d7' => []],
     ];
    $i = 0;

    // Get nodes d7 for category_ids.
    foreach ($category_ids as $cid) {
      $results = $db->query("SELECT entity_id FROM field_data_field_categoria WHERE field_categoria_tid = :c_id", [':c_id' => $cid['id_d7']]);
      $node_ids = [];
      foreach($results as $item) {
        $node_ids[]= $item->entity_id;
      }
      $category_ids[$i]['nodes_d7'] = $node_ids;
      $i++;
    }

    // Set equivalent for d8 nodes.
    \Drupal\Core\Database\Database::setActiveConnection();
    foreach ($category_ids as $cid) {
      foreach ($cid['nodes_d7'] as $node_ids) {
        if ($node = Node::load($node_ids)) {
          //dpm($node->getTitle() . "--" . $cid['id_d8']);
          //$node->set('field_categoria', $cid['id_d8']);
          $node->field_categoria->appendItem($cid['id_d8']);
          $node->save();
        }
      }
    }

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }
}
