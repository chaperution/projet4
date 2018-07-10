
var flashMessageSuccess = document.getElementById('success');

var flashMessageError = document.getElementById('error');

if (flashMessageSuccess !== null) {
	setTimeout(function(){flashMessageSuccess.style.display = 'none'}, 5000);
}

if (flashMessageError !== null) {
	setTimeout(function(){flashMessageError.style.display = 'none'}, 5000);
}


