<?php

/**
 * @file
 * Main functions and hook implementations of the Wishlist install profile.
 */

use Drupal\Core\Url;
use Drupal\Core\Form\FormState;

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * Redirects the user to their wishlists after logging in.
 */
function wishlist_form_user_login_form_alter(&$form, FormState $form_state) {
  $form['#submit'][] = 'wishlist_user_login_submit';
}

/**
 * Form submission handler for user_login_form().
 */
function wishlist_user_login_submit(&$form, FormState $form_state) {
  // Check if a destination was set, probably on an exception controller.
  // @see \Drupal\user\Form\UserLoginForm::submitForm()
  $request = \Drupal::service('request_stack')->getCurrentRequest();
  if (!$request->request->has('destination')) {
    $url = Url::fromRoute('view.wishlists.my_wishlists');
    $form_state->setRedirectUrl($url);
  }
  else {
    $request->query->set('destination', $request->request->get('destination'));
  }
}
