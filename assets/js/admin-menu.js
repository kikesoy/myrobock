$(document).ready(function () {
    $('.nav-dropdown').click(function(navSubnav) {
        navSubnav.preventDefault();
        $(this).parent().toggleClass('activate');
        $('.nav-sub-menu').slideToggle('fast');
      });
});