<?php

namespace Drupal\twig_showcase\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller to render stories.
 */
class ShowcaseController extends ControllerBase {

  /**
   * Builds the showcase.
   *
   * @return array
   *   Array with components to render on theme twig_showcase.
   */
  public function build() {
    $showcaseHandler = \Drupal::service('twig_showcase.showcase_handler');
    $activeThemeName = $showcaseHandler->getActiveTheme()->getName();
    $components = $showcaseHandler->getComponents();

    return [
      '#theme' => 'twig_showcase',
      '#variables' => [
        'activeTheme' => $activeThemeName,
        'components' => $components,
      ],
    ];
  }

}
