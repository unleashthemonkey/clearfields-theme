// animation based on code from http://net.tutsplus.com/tutorials/javascript-ajax/how-to-create-a-mootools-homepage-inspired-navigation-effect-using-jquery/

jQuery(document).ready(function ($) {
    // Now you can use $ as a reference to jQuery without any problem
    $("#home #access li:last-child").addClass("last-item");

	revealmenu();
	revealhome();
	
	$('#home #access ul li').hover(
        function () {
            //show its submenu
            $('ul', this).stop().slideDown(100);
 
        },
        function () {
            //hide its submenu
            $('ul', this).stop().slideUp(100);         
        }
    );
});

function revealmenu()
{
	$("#menu-frontpage-menu > li.menu-item").each(function(i)
	{
		// margin left = - ([width of element] + [total vertical padding of element])
		$("#menu-frontpage-menu li.menu-item").removeClass("visuallyhidden")
		$(this).hide();
		$(this).delay(500+200*i).fadeIn(600);
	});
}

function revealhome()
{
	mostrar("#slidecaption");
	mostrar("hgroup");
	mostrar("#colophon");
}

function ocultar(que) {
	$(que).fadeOut(400);
}
	
function mostrar(que) {
	$(que).removeClass("invisible").hide().delay(500).fadeIn(1000);
}