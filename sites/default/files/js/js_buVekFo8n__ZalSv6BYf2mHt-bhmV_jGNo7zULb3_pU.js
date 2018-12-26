/* global navigator */
/* global jQuery */

jQuery.ajax({
  url: 'http://slink2-aaronbrowder.c9users.io/node/23?_format=hal_json',
  method: 'GET',
  success: function (comment) {
    console.log(comment);
  }
});

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
