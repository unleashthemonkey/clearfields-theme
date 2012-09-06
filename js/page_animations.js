function ocultar(que) {
	$(que).fadeOut(400);
}
	
function mostrar(que) {
	$(que).removeClass("invisible").hide().delay(500).fadeIn(1000);
}