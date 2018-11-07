document.addEventListener('DOMContentLoaded', responsiveMenu, false);

function responsiveMenu() {
    var details = document.getElementsByClassName('js-responsive-details');
    if (screen.width >= 851) {
        for (var i = 0; i < details.length; i++) {
            details[i].setAttribute('open', true);   
        }
    }
}