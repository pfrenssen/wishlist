<?php

namespace Drupal\wishlists;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Wishlist entity.
 *
 * @see \Drupal\wishlists\Entity\Wishlist.
 */
class WishlistAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\wishlists\Entity\WishlistInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished wishlists');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published wishlists');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit wishlists');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete wishlists');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add wishlists');
  }

}
