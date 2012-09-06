function ocultar(que) {
	$(que).fadeOut(400);
}
	
function mostrar(que,delay,tiempo) {
	if(delay==undefined){
		delay=500;
	}
	if(tiempo==undefined){
		tiempo=1000;
	}
	$(que).removeClass("invisible").hide().delay(delay).fadeIn(tiempo);
}

function mostrarslide(que,delay,tiempo) {
	if(delay==undefined){
		delay=500;
	}
	if(tiempo==undefined){
		tiempo=1000;
	}
	$(que).removeClass("invisible").hide().delay(delay).slideDown(1000,'easeOutBack');
}

function mostrarnow(que){
	$(que).removeClass("invisible").show();
}