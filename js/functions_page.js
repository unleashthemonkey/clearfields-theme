jQuery(document).ready(function ($) {
	loadanimation();
	exitanimation();
	togglesitemap();
});

function loadanimation(){
	var refurl=document.referrer;
	var referurlarray=refurl.split("/");
	var thisurl=document.URL;
	var thisurlarray=thisurl.split("/");
	
	if (referurlarray[5]==thisurlarray[5]){
		revealpagenow();
	}
	else{
		revealpage();
	}
}


function exitanimation(){
$("a:not(a.load-item,a#toggle-sitemap-link,#slider-gallery a,a.close,.overlay a,a[target='_blank'])").click(function(event) {
    event.preventDefault();
    var linkurl = this.href;
    var linkurlarray = linkurl.split("/");
    var thisurl=document.URL;
	var thisurlarray=thisurl.split("/");
	
	if (linkurlarray[5]==thisurlarray[5]){
		if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
	            var referLink = document.createElement('a');
	            referLink.href = linkurl;
	            document.body.appendChild(referLink);
	            referLink.click();
		} else {
	            location.href = linkurl;
		}
	} else {
    hidepage();
    
    $(this).fadeOut(400, function(){
		if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
	            var referLink = document.createElement('a');
	            referLink.href = linkurl;
	            document.body.appendChild(referLink);
	            referLink.click();
		} else {
	            location.href = linkurl;
		}	    
    });	
	}
    
});
}

var toggleCounter = 0;
function togglesitemap(){
	$("a#toggle-sitemap-link").click(function(event) {
	event.preventDefault();
	$("#site-generator").slideToggle(300,'easeOutQuad');
	toggleCounter++;
	if(toggleCounter>1){toggleCounter=0;}
	if (toggleCounter==1){
	$("#toggle-sitemap").addClass("closed");
	} else {
	$("#toggle-sitemap").removeClass("closed");
	}
	});
}

function revealpagenow()
{
	mostrarnow("#header-wrapper");
	mostrarnow("#access");
	mostrarnow("#colophon");
	mostrarnow("#main");
}

function revealpage()
{
	mostrar("#header-wrapper",500,800);
	mostrar("#access",1000,800);
	mostrar("#colophon",1000,800);
	mostrar("#main",1000,800);
}

function hidepage()
{
	ocultar("#header-wrapper");
	ocultar("#access");
	ocultar("#colophon");
	ocultar("#main");
}