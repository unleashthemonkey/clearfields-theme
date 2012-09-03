jQuery(document).ready(function ($) {
     
    $('#menu-frontpage-menu .sub-menu').hover(
        function () {
            //show its submenu
            $('ul', this).stop().show('slow');
 
        },
        function () {
            //hide its submenu
            $('ul', this).stop().slideUp(100);         
        }
    );
     
});