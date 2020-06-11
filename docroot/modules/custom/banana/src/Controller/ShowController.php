<?php

namespace Drupal\banana\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for banana routes.
 */
class ShowController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    $auxi = $build;

    return $build;
  }

}
