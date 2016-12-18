<?php

namespace Drupal\wishlists\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Wishlist entities.
 *
 * @ingroup wishlists
 */
interface WishlistInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  /**
   * Gets the Wishlist name.
   *
   * @return string
   *   Name of the Wishlist.
   */
  public function getName();

  /**
   * Sets the Wishlist name.
   *
   * @param string $name
   *   The Wishlist name.
   *
   * @return \Drupal\wishlists\Entity\WishlistInterface
   *   The called Wishlist entity.
   */
  public function setName($name);

  /**
   * Gets the Wishlist creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Wishlist.
   */
  public function getCreatedTime();

  /**
   * Sets the Wishlist creation timestamp.
   *
   * @param int $timestamp
   *   The Wishlist creation timestamp.
   *
   * @return \Drupal\wishlists\Entity\WishlistInterface
   *   The called Wishlist entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Wishlist published status indicator.
   *
   * Unpublished Wishlist are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Wishlist is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Wishlist.
   *
   * @param bool $published
   *   TRUE to set this Wishlist to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\wishlists\Entity\WishlistInterface
   *   The called Wishlist entity.
   */
  public function setPublished($published);

}
