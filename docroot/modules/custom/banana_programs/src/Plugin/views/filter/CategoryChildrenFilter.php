<?php

/**
 * @file
 * Definition of Drupal\banana_programs\Plugin\views\filter\CategoryChildrenFilter.
 */

namespace Drupal\banana_programs\Plugin\views\filter;

use Drupal\taxonomy\Entity\Term;
use Drupal\views\Plugin\views\filter\InOperator;

/**
 * Filters by list of categories child from parent
 *
 * @ingroup views_filter_handlers
 *
 * @ViewsFilter("views_category_children_filter")
 */
class CategoryChildrenFilter extends InOperator {

  public function query() {
    parent::query();
  }

  public function getValueOptions() {
    $path = $_SERVER['REDIRECT_URL'];
    $path_array = explode("/", $path);
    $link_text = $path_array['3'];

    $db = \Drupal\Core\Database\Database::getConnection();
    $results = $db->query("SELECT entity_id FROM taxonomy_term__field_link WHERE field_link_title = :link_text", [':link_text' => $link_text]);
    foreach($results as $item) {
      $id_parent = $item->entity_id;
      break;
    }

    if(isset($id_parent)) {
      $parent = Term::load($id_parent);
      $etm = \Drupal::entityTypeManager();
      $term_storage = $etm->getStorage('taxonomy_term');
      $children = $term_storage->getChildren($parent);

      $curr_langcode = \Drupal::languageManager()->getCurrentLanguage(\Drupal\Core\Language\LanguageInterface::TYPE_CONTENT)->getId();
      $parent_trans = \Drupal::service('entity.repository')->getTranslationFromContext($parent, $curr_langcode);
      $options = [
        $parent->id() => $parent_trans->getName(),
      ];
      foreach ($children as $child) {
        $child_trans = \Drupal::service('entity.repository')->getTranslationFromContext($child, $curr_langcode);
        $options+= [
          $child_trans->id() => $child_trans->getName(),
        ];
      }
      $this->valueOptions = $options;
      return $this->valueOptions;
    }
    else {
      $this->valueOptions = [
        '295' => t('Default'),
      ];
      return $this->valueOptions;
    }

  }
}
