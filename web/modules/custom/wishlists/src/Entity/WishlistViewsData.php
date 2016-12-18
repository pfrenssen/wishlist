<?php

namespace Drupal\wishlists\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Wishlist entities.
 */
class WishlistViewsData extends EntityViewsData implements EntityViewsDataInterface {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['wishlist']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Wishlist'),
      'help' => $this->t('The Wishlist ID.'),
    );

    return $data;
  }

}
