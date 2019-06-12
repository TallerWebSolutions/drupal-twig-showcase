<?php

namespace Drupal\twig_showcase;

use Drupal\Core\Discovery\YamlDiscovery;
use Drupal\Core\Theme\ThemeManagerInterface;

/**
 * Provides the default implementation of a main showcase related functions.
 */
class ShowcaseHandler {

  /**
   * The theme manager.
   *
   * @var \Drupal\Core\Theme\ThemeManagerInterface
   */
  protected $themeManager;

  /**
   * Constructs a new ShowcaseHandler object.
   *
   * @param \Drupal\Core\Theme\ThemeManagerInterface $theme_manager
   *   The theme manager.
   */
  public function __construct(ThemeManagerInterface $theme_manager) {
    $this->themeManager = $theme_manager;
  }

  /**
   * Gets the active theme.
   *
   * @return \Drupal\Core\Theme\ActiveTheme
   *   The active theme.
   */
  public function getActiveTheme() {
    return $this->themeManager->getActiveTheme();
  }

  /**
   * Gets the components by theme.
   *
   * @return array
   *   Array with the components info.
   */
  public function getComponents() {
    $activeTheme = $this->getActiveTheme();
    $activeThemePath = $activeTheme->getPath();
    $activeThemeName = $activeTheme->getName();

    // What if it does not find?
    $yaml_discovery = new YamlDiscovery('stories', [
      $activeThemeName => $activeThemePath,
    ]);

    return $yaml_discovery->findAll()[$activeThemeName];
  }

}
