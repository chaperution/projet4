

// Gestion des messages d'erreur et de succès

var flashMessageSuccess = document.getElementById('success');

var flashMessageError = document.getElementById('error');

if (flashMessageSuccess !== null) {
	setTimeout(function(){flashMessageSuccess.style.display = 'none'}, 5000);
}

if (flashMessageError !== null) {
	setTimeout(function(){flashMessageError.style.display = 'none'}, 5000);
}


// Gestion des modals pour suppression de posts, commentaires et membres

function Modal(buttonRemove, modals, closes) {
	this.buttonRemove = buttonRemove;
	this.modals = modals;
	this.closes = closes;

	for (let i = 0; i < this.buttonRemove.length; i++) {
		let modal = document.getElementById(this.modals + i.toString());
		let close = document.getElementById(this.closes + i.toString());
		
		this.buttonRemove[i].addEventListener('click', function() {
			modal.style.display = "block";
		});

		close.addEventListener('click', function() {
			modal.style.display = "none";
		});

		window.addEventListener('click', function(e) {
			if (e.target == modal) {
				modal.style.display = "none";
			}
		});
	};
}

var modalPosts = new Modal(document.getElementsByClassName('removePost'), 'postModal', 'closePostModal');
var modalComments = new Modal(document.getElementsByClassName('removeComment'), 'reportModal', 
	'closeCommentModal');
var modalMembers = new Modal(document.getElementsByClassName('removeMember'), 'memberModal', 
	'closeMemberModal');


// ______________________ MENU HAMBURGER RESPONSIVE _______________________

var icone = document.getElementById("header-icon");
var menu = document.getElementById("menu");
var activatedClass = "menu-activated";

// ajoute une classe active lors du click sur le menu responsive pour le faire apparaitre
icone.addEventListener("click", function(e) {
	e.preventDefault();
	menu.classList.toggle(activatedClass);
});
