function matchurl(que) {
	$('#menu a').click(function(event) {
    event.preventDefault();
    var href = this.href;

    $('#whatever').animate({
        top: '300px'
    }, 500,
    function() {
        window.location = href;
    });
});

function ocultar(que) {
	$(que).fadeOut(400);
}
	
function mostrar(que) {
	$(que).removeClass("invisible").hide().delay(500).fadeIn(1000);
}