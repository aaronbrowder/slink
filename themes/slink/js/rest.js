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

function patchNode(csrfToken, nodeId, nodeData) {
  jQuery.ajax({
    url: `${baseUrl}/node/${nodeId}?_format=hal_json`,
    method: 'PATCH',
    headers: {
      'Content-Type': 'application/hal+json',
      'X-CSRF-Token': csrfToken
    },
    data: JSON.stringify(nodeData),
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
    patchNode(csrfToken, nodeId, nodeData);
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
});