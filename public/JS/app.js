/*$(document).ready(function(){
	/**/

/*	var comments = $('#comments');
	var container = $('#panelFrame');

	comments.on("click", function() {
		$(container).load('view/backend/test.php #pipi');
		/*ajaxGet("view/backend/test.php", function(reponse) {
			console.log(reponse);
			container.innerHTML = reponse;
		});*/
		/*console.log("bonjour");
	});
});*/

// Gestion des messages d'erreur et de succès

var flashMessageSuccess = $('success');

var flashMessageError = $('error');

if (flashMessageSuccess !== null) {
	setTimeout(function(){flashMessageSuccess.style.display = 'none'}, 5000);
}

if (flashMessageError !== null) {
	setTimeout(function(){flashMessageError.style.display = 'none'}, 5000);
}





