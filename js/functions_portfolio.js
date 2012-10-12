jQuery(document).ready(function ($) {
	removeNthMargin(3);

function removeNthMargin(a)
{
	$(".portfolio-item:nth-child("+a+"n+"+a+")").css("margin-right","0");
}
});