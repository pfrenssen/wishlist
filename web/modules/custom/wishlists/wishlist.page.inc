<?php

/**
 * @file
 * Contains wishlist.page.inc.
 *
 * Page callback for Wishlist entities.
 */

use Drupal\Core\Render\Element;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Prepares variables for Wishlist templates.
 *
 * Default template: wishlist.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_wishlist(array &$variables) {
  // Fetch Wishlist Entity Object.
  $wishlist = $variables['elements']['#wishlist'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
