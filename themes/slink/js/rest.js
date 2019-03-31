/* global jQuery */
/* global Drupal */

const baseUrl = window.location.protocol + '//' + window.location.hostname;
console.log('baseUrl: ' + baseUrl);

const $ = jQuery;

function getCsrfToken(callback) {
  jQuery
    .get(Drupal.url('rest/session/token'))
    .done(function (data) {
      var csrfToken = data;
      callback(csrfToken);
    });
}

function patch(csrfToken, url, data) {
  jQuery.ajax({
    url: `${url}?_format=hal_json`,
    method: 'PATCH',
    headers: {
      'Content-Type': 'application/hal+json',
      'X-CSRF-Token': csrfToken
    },
    data: JSON.stringify(data),
    success: function (response) {
      console.log(response);
    }
  });
}

function updateApplication(nodeId, completed, canceled) {
  var nodeData = {
    _links: {
      type: {
        href: `${baseUrl}/rest/type/node/student_hosting_application`
      }
    },
    type: {
      target_id: 'student_hosting_application'
    },
    field_completed: {
      value: completed
    },
    field_canceled: {
      value: canceled
    }
  };
    
  getCsrfToken(function (csrfToken) {
    patch(csrfToken, `${baseUrl}/node/${nodeId}`, nodeData);
  }); 
}

function updateForumSubscription(forumId, userId, subscribe) {
  //console.log(`forumId: ${forumId}, userId: ${userId}, subscribe: ${subscribe}`);
  getCsrfToken(function (csrfToken) {
    patch(csrfToken, `${baseUrl}/forum-subscribe/${forumId}/${userId}/${subscribe}`);
    $('#slink-forum-subscribe-success').show();
  });
}

$(document).ready(function() {
  $('#application-box-inbox').click(function() {
    updateApplication($(this).data('node-id'), false, false); 
  });
  $('#application-box-completed').click(function() {
    updateApplication($(this).data('node-id'), true, false); 
  });
  $('#application-box-canceled').click(function() {
    updateApplication($(this).data('node-id'), false, true); 
  });
  
  $('#slink-forum-subscribe').click(function() {
    updateForumSubscription($(this).data('forum-id'), $(this).data('user-id'), this.checked);
  });
});