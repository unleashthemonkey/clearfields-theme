jQuery(document).ready(function ($) {
	loadanimation();
	exitanimation();
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
$('a :not(load-item)').click(function(event) {
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


function revealpagenow()
{
	mostrarnow("#header-wrapper");
	mostrarnow("#access");
	mostrarnow("#colophon");
	mostrarnow("#content");
}

function revealpage()
{
	mostrar("#header-wrapper");
	mostrar("#access",1000,500);
	mostrar("#colophon",1000,500);
	mostrar("#content",1000,500);
}

function hidepage()
{
	ocultar("#header-wrapper");
	ocultar("#access");
	ocultar("#colophon");
	ocultar("#content");
}