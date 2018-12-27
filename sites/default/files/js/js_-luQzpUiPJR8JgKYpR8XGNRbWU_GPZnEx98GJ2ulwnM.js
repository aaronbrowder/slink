/* global navigator */

document.addEventListener('DOMContentLoaded', responsiveMenu, false);

function responsiveMenu() {
    // Responsive details (i.e. the Site Navigation) are closed by default but
    // should be opened on page load when the screen size is large.
    var responsiveDetails = document.getElementsByClassName('js-responsive-details');
    if (screen.width >= 851) {
        for (var i = 0; i < responsiveDetails.length; i++) {
            responsiveDetails[i].setAttribute('open', true);   
        }
    }
    // IE does not support HTML5 details, so we need all details elements to
    // be opened on page load on IE.
    var isIE = false;
    if (/MSIE 10/i.test(navigator.userAgent)) {
       // This is internet explorer 10
       isIE = true;
    }
    if (/MSIE 9/i.test(navigator.userAgent) || /rv:11.0/i.test(navigator.userAgent)) {
        // This is internet explorer 9 or 11
        isIE = true;
    }
    if (/Edge\/\d./i.test(navigator.userAgent)){
       // This is Microsoft Edge
       isIE = true;
    }
    if (isIE) {
        var allDetails = document.getElementsByTagName('details');
        for (var i = 0; i < allDetails.length; i++) {
            allDetails[i].setAttribute('open', true);   
        }   
    }
};
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
});;
