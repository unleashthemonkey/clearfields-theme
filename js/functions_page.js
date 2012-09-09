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
	
	if (referurlarray[3]==thisurlarray[3]){
		revealpagenow();
	}
	else{
		revealpage();
	}
}


function exitanimation(){
$("a:not(a.load-item,a#toggle-sitemap-link)").click(function(event) {
    event.preventDefault();
    var linkurl = this.href;
    var linkurlarray = linkurl.split("/");
    var thisurl=document.URL;
	var thisurlarray=thisurl.split("/");
	
	if (linkurlarray[3]==thisurlarray[3]){
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

function togglesitemap(){
	$("a#toggle-sitemap-link").click(function(event) {
	event.preventDefault();
	$("#site-generator").slideToggle(300,'easeOutQuad');
	});
}

function revealpagenow()
{
	mostrarnow("#header-wrapper");
	mostrarnow("#access");
	mostrarnow("#colophon");
	mostrarnow("#content");
}

function revealpage()
{
	mostrar("#header-wrapper",500,800);
	mostrar("#access",1000,800);
	mostrar("#colophon",1000,800);
	mostrar("#content",1000,800);
}

function hidepage()
{
	ocultar("#header-wrapper");
	ocultar("#access");
	ocultar("#colophon");
	ocultar("#content");
}