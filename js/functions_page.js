jQuery(document).ready(function ($) {
	loadanimation();
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
	mostrar("#access");
	mostrar("#colophon");
	mostrar("#content");
}
