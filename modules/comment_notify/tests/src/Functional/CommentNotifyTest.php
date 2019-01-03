<?php

namespace Drupal\Tests\comment_notify\Functional;

use Drupal\comment\CommentInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\field\Entity\FieldConfig;
use Drupal\node\NodeInterface;

/**
 * Comment notify general tests.
 *
 * @group comment_notify
 */
class CommentNotifyTest extends CommentNotifyTestBase {

  /**
   * Test various behaviors for anonymous users.
   */
  public function testCommentNotifyAnonymousUserFunctionalTest() {

    $this->drupalLogin($this->adminUser);

    // Enable comment notify on this node and allow anonymous information in
    // comments.
    $this->drupalCreateContentType([
      'type' => 'article',
    ]);
    $this->addDefaultCommentField('node', 'article');
    $comment_field = FieldConfig::loadByName('node', 'article', 'comment');
    $comment_field->setSetting('anonymous', CommentInterface::ANONYMOUS_MAY_CONTACT);
    $comment_field->save();

    // Create a node with comments allowed.
    $node = $this->drupalCreateNode(array('type' => 'article', 'promote' => NodeInterface::PROMOTED));

    // Allow anonymous users to post comments and get notifications.
    user_role_grant_permissions(
      AccountInterface::ANONYMOUS_ROLE,
      [
        'access comments',
        'access content',
        'post comments',
        'skip comment approval',
        'subscribe to comments',
      ]
    );
    $this->drupalLogout();

    // Notify type 1 - All comments on the node.
    // First confirm that we properly require an e-mail address.
    $subscribe_1 = ['notify' => TRUE, 'notify_type' => COMMENT_NOTIFY_NODE];
    $this->drupalGet($node->toUrl());
    $this->postCommentNotifyComment($node, $this->randomMachineName(), $this->randomMachineName(), $subscribe_1);
    $this->assertTrue($this->getSession()->getPage()->hasContent(t('If you want to subscribe to comments you must supply a valid e-mail address.')));

    // Try again with an e-mail address.
    $contact_1 = array('name' => $this->randomMachineName(), 'mail' => $this->getRandomEmailAddress());
    $anonymous_comment_1 = $this->postCommentNotifyComment($node, $this->randomMachineName(), $this->randomMachineName(), $subscribe_1, $contact_1);

    // Confirm that the notification is saved.
    $result = comment_notify_get_notification_type($anonymous_comment_1['id']);
    $this->assertEquals($result, $subscribe_1['notify_type'], 'Notify selection option 1 is saved properly.');

    // Notify type 2 - replies to a comment.
    $subscribe_2 = array('notify' => TRUE, 'notify_type' => COMMENT_NOTIFY_COMMENT);
    $contact_2 = array('name' => $this->randomMachineName(), 'mail' => $this->getRandomEmailAddress());
    $anonymous_comment_2 = $this->postCommentNotifyComment($node, $this->randomMachineName(), $this->randomMachineName(), $subscribe_2, $contact_2);

    // Confirm that the notification is saved.
    $result = comment_notify_get_notification_type($anonymous_comment_2['id']);
    $this->assertEquals($result, $subscribe_2['notify_type'], 'Notify selection option 2 is saved properly.');

    // Confirm that the original subscriber with all comments on this node got
    // their mail.
    $this->assertMail('to', $contact_1['mail'], t('Message was sent to the proper anonymous user.'));

    // Test the unsubscribe link.
    $mails = $this->getMails();
    preg_match("/\/comment_notify\/disable\/.+/", $mails[0]['body'], $output);
    $this->drupalGet($output[0]);
    $this->assertTrue($this->getSession()->getPage()->hasContent("Your comment follow-up notification for this post was disabled. Thanks."));

    // Notify type 0 (i.e. only one mode is enabled).
    \Drupal::configFactory()->getEditable('comment_notify.settings')->set('available_alerts', [1 => FALSE, 2 => TRUE])->save();
    $subscribe_0 = array('notify' => TRUE);
    $contact_0 = array('mail' => $this->getRandomEmailAddress());
    $anonymous_comment_0 = $this->postCommentNotifyComment($node, $this->randomMachineName(), $this->randomMachineName(), $subscribe_0, $contact_0);

    // Confirm that the notification is saved.
    $result = comment_notify_get_notification_type($anonymous_comment_0['id']);
    $this->assertEquals($result, 2, 'Notify selection option 0 is saved properly.');

  }

}
