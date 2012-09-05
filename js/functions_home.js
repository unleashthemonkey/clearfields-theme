// animation based on code from http://net.tutsplus.com/tutorials/javascript-ajax/how-to-create-a-mootools-homepage-inspired-navigation-effect-using-jquery/

jQuery(document).ready(function ($) {
    // Now you can use $ as a reference to jQuery without any problem
    $("#home #access li:last-child").addClass("last-item");

	revealmenu();
	revealhome();
	
/*
	$('#home #access ul li').hover(
        function () {
            //show its submenu
            $('ul li', this).first().stop().fadeIn(100, function showNext() {
            	$(this).next('li').stop().fadeIn(100, showNext)
            });
 
        },
        function () {
            //hide its submenu
            $('ul li', this).last().stop().fadeOut(100, function showNext() {
            	$(this).prev('li').stop().fadeOut(100, showNext)
            });       
        }
    );
*/
	$('#home #access ul li').hover(
        function () {
            //show its submenu
            $('ul li', this).stop().fadeIn(400);
            $('ul', this).stop().slideDown(100,'easeInOutQuad'); 
        },
        function () {
            //hide its submenu
            $('ul li', this).stop().fadeOut(200);
            $('ul', this).stop().slideUp(200,'easeInOutQuad');       
        }
    );


});

function revealmenu()
{
	$("#access .menu > li.menu-item").each(function(i)
	{
		// margin left = - ([width of element] + [total vertical padding of element])
		$("#access .menu li.menu-item").removeClass("visuallyhidden")
		$(this).hide();
		$(this).delay(500+200*i).fadeIn(600);
	});
}

function revealhome()
{
	mostrar("#slidecaption");
	mostrar("hgroup");
	mostrar("#colophon");
	mostrar(".utility");
}