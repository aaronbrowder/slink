<?php

namespace Drupal\forum_notification\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\taxonomy\Entity\Term;
use Drupal\user\Entity\User;
use Symfony\Component\HttpFoundation\Response;

/**
 * Provides a resource for a user to subscribe to or unsubscribe from a forum.
 *
 * @RestResource(
 *   id = "subscribe_resource",
 *   label = @Translation("Subscribe Resource"),
 *   uri_paths = {
 *     "canonical" = "/forum-subscribe/{forum_id}/{user_id}/{subscribe}"
 *   }
 * )
 */
class SubscribeResource extends ResourceBase {

  public function patch($forum_id, $user_id, $subscribe) {
    
    function search($arr, $target_id) {
      foreach ($arr as $key => $value) {
        if ($value['target_id'] == $target_id) {
          return $key;
        }
      }
      return false;
    }
    
    $forum = Term::load($forum_id);
    $user = User::load($user_id);
    
    if ($subscribe == 'true') {
      $user->field_forum_subscriptions[] = ['target_id' => $forum_id];
    } else {
      $forum_subscriptions = $user->get('field_forum_subscriptions')->getValue();
      $key = search($forum_subscriptions, $forum_id);
      unset($user->field_forum_subscriptions[$key]);
    }
    
    $user->save();
    
    return new Response();
  }
}