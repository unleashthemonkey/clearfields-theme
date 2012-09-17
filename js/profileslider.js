jQuery(document).ready(function ($) {
	/* This code is executed after the DOM has been completely loaded */
	
	$("#slider-gallery li.menuItem:last-child").addClass("last-item");

	var totWidth=0;
	var positions = new Array();

	$('#slider-gallery #slides .slide').each(function(i){
		/* Loop through all the slides and store their accumulative widths in totWidth */
		positions[i]= totWidth;
		totWidth += $(this).width();

		/* The positions array contains each slide's commulutative offset from the left part of the container */

		if(!$(this).width())
		{
			alert("Please, fill in width & height for all your images!");
			return false;
		}
	});

	$('#slider-gallery #slides').width(totWidth);

	/* Change the cotnainer div's width to the exact width of all the slides combined */

	$('#slider-gallery #menu ul li a').click(function(e){

		/* On a thumbnail click */
		$('#slider-gallery li.menuItem').removeClass('act').addClass('inact');
		$(this).parent().addClass('act');

		var pos = $(this).parent().prevAll('.menuItem').length;

		$('#slider-gallery #slides').stop().animate({marginLeft:-positions[pos]+'px'},450);
		/* Start the sliding animation */

		e.preventDefault();
		/* Prevent the default action of the link */
	});

	$('#slider-gallery #menu ul li.menuItem:first').addClass('act').siblings().addClass('inact');
	/* On page load, mark the first thumbnail as active */
});