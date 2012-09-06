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


function goto(url){
  if(isIE){
    var referLink = document.createElement('a');
    referLink.href = url;
    document.body.appendChild(referLink);
    referLink.click();    
  }
  else{
      location.href = url;
  }
}


function exitanimation(){
$('#access a').click(function(event) {
    event.preventDefault();
    var linkurl = this.href;
    
    $(this).slideUp(500, function(){
		if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
	            var referLink = document.createElement('a');
	            referLink.href = linkurl;
	            document.body.appendChild(referLink);
	            referLink.click();
		} else {
	            location.href = linkurl;
		}	    
    });
    
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
	mostrar("#access");
	mostrar("#colophon");
	mostrar("#content");
}
