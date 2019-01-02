<?php

namespace Drupal\Tests\comment_notify\Functional;

/**
 * Tests for the comment_notify module.
 *
 * @group comment_notify
 */
class CommentNotifyConfigPageTest extends CommentNotifyTestBase {

  /**
   * Test that the config page is working.
   */
  protected function setUp() {
    parent::setUp();

    $this->drupalLogin($this->adminUser);

    // Enable comment notify on this node.
    $this->drupalCreateContentType([
      'type' => 'article',
    ]);
    $this->addDefaultCommentField('node', 'article');
  }

  /**
   * Test to all the options are saved correctly.
   */
  public function testConfigPage() {
    $this->drupalGet("admin/config/people/comment_notify");

    // Test the default values are working.
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');

    // Test that the content types are saved correctly.
    $this->getSession()->getPage()->checkField('node_types[article]');
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $this->assertTrue($this->getSession()->getPage()->hasCheckedField('node_types[article]'));

    // Test that Available subscription modes are saved correctly.
    $this->getSession()->getPage()->checkField('available_alerts[1]');
    $this->getSession()->getPage()->checkField('available_alerts[2]');
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $this->assertTrue($this->getSession()->getPage()->hasCheckedField('available_alerts[1]'));
    $this->assertTrue($this->getSession()->getPage()->hasCheckedField('available_alerts[2]'));

    // Test that at least one subscription mode must be enabled.
    $this->getSession()->getPage()->uncheckField('available_alerts[1]');
    $this->getSession()->getPage()->uncheckField('available_alerts[2]');
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('You must enable at least one subscription mode.');

    $this->getSession()->getPage()->uncheckField('available_alerts[1]');
    $this->getSession()->getPage()->checkField('available_alerts[2]');
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $this->assertTrue($this->getSession()->getPage()->hasUncheckedField('available_alerts[1]'));
    $this->assertTrue($this->getSession()->getPage()->hascheckedField('available_alerts[2]'));
    // The default state select must hide the option as well.
    $field = $this->getSession()->getPage()->findField('Default state for the notification selection box');
    $this->assertFalse(strpos($field->getHtml(), 'All Comments'));
    $this->assertTrue(strpos($field->getHtml(), 'Replies to my comment'));

    $this->getSession()->getPage()->uncheckField('available_alerts[2]');
    $this->getSession()->getPage()->checkField('available_alerts[1]');
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $this->assertTrue($this->getSession()->getPage()->hasUncheckedField('available_alerts[2]'));
    $this->assertTrue($this->getSession()->getPage()->hascheckedField('available_alerts[1]'));
    // The default state select must hide the option as well.
    $field = $this->getSession()->getPage()->findField('Default state for the notification selection box');
    $this->assertTrue(strpos($field->getHtml(), 'All comments'));
    $this->assertFalse(strpos($field->getHtml(), 'Replies to my comment'));

    $this->getSession()->getPage()->checkField('available_alerts[1]');
    $this->getSession()->getPage()->checkField('available_alerts[2]');
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $this->assertTrue($this->getSession()->getPage()->hascheckedField('available_alerts[1]'));
    $this->assertTrue($this->getSession()->getPage()->hascheckedField('available_alerts[2]'));
    $field = $this->getSession()->getPage()->findField('Default state for the notification selection box');
    $this->assertTrue(strpos($field->getHtml(), 'All comments'));
    $this->assertTrue(strpos($field->getHtml(), 'Replies to my comment'));

    $this->getSession()->getPage()->selectFieldOption('Default state for the notification selection box', "0");
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $field = $this->getSession()->getPage()->findField('Default state for the notification selection box');
    $this->assertTrue($field->getValue() == "0");

    $this->drupalGet("admin/config/people/comment_notify");
    $this->getSession()->getPage()->selectFieldOption('Default state for the notification selection box', "1");
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $field = $this->getSession()->getPage()->findField('Default state for the notification selection box');
    $this->assertTrue($field->getValue() == "1");

    $this->getSession()->getPage()->selectFieldOption('Default state for the notification selection box', "2");
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $field = $this->getSession()->getPage()->findField('Default state for the notification selection box');
    $this->assertTrue($field->getValue() == "2");

    $this->getSession()->getPage()->checkField('Subscribe users to their node follow-up notification emails by default');
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $this->assertTrue($this->getSession()->getPage()->hasCheckedField('Subscribe users to their node follow-up notification emails by default'));

    $this->getSession()->getPage()->uncheckField('Subscribe users to their node follow-up notification emails by default');
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $this->assertTrue($this->getSession()->getPage()->hasUncheckedField('Subscribe users to their node follow-up notification emails by default'));

    $this->getSession()->getPage()->fillField('Default mail text for sending out notifications to commenters', 'Hello');
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $field = $this->getSession()->getPage()->findField('Default mail text for sending out notifications to commenters');
    $this->assertTrue($field->getValue() == 'Hello');

    $this->getSession()->getPage()->fillField('Default mail text for sending out the notifications to node authors', 'Hello');
    $this->submitForm([], 'Save configuration');
    $this->assertSession()->responseContains('The configuration options have been saved.');
    $this->drupalGet("admin/config/people/comment_notify");
    $field = $this->getSession()->getPage()->findField('Default mail text for sending out the notifications to node authors');
    $this->assertTrue($field->getValue() == 'Hello');

  }

}
