

// Gestion des messages d'erreur et de succès

var flashMessageSuccess = document.getElementById('success');

var flashMessageError = document.getElementById('error');

if (flashMessageSuccess !== null) {
	setTimeout(function(){flashMessageSuccess.style.display = 'none'}, 5000);
}

if (flashMessageError !== null) {
	setTimeout(function(){flashMessageError.style.display = 'none'}, 5000);
}


// Gestion des modals pour la suppression des posts

var buttonPosts = document.getElementsByClassName('removePost');

for (let i = 0; i < buttonPosts.length; i++) {
	let buttonPost = buttonPosts[i];
	let modal = document.getElementById('postModal'+ i.toString());
	let closePost = document.getElementById('closePostModal'+ i.toString());

	buttonPost.addEventListener('click', function() {
		modal.style.display = "block";
	});

	closePost.addEventListener('click', function() {
		modal.style.display = "none";
	});

	window.addEventListener('click', function(e) {
		if (e.target == modal) {
			modal.style.display = "none";
		}
	});
};


// Gestion des modals pour la suppression des reports

var buttonComments = document.getElementsByClassName('removeComment');

for (let i = 0; i < buttonComments.length; i++) {
	let buttonComment = buttonComments[i];
	let modal = document.getElementById('reportModal'+ i.toString());
	let closeComment = document.getElementById('closeCommentModal'+ i.toString());

	buttonComment.addEventListener('click', function() {
	modal.style.display = "block";
	});

	closeComment.addEventListener('click', function() {
		modal.style.display = "none";
	});

	window.addEventListener('click', function(e) {
		if (e.target == modal) {
			modal.style.display = "none";
		}
	});
};


// Gestion des modals pour la suppression des membres

var buttonMembers = document.getElementsByClassName('removeMember');

for (let i = 0; i < buttonMembers.length; i++) {
	let buttonMember = buttonMembers[i];
	let modal = document.getElementById('memberModal'+ i.toString());
	let closeMember = document.getElementById('closeMemberModal'+ i.toString());

	buttonMember.addEventListener('click', function() {
		modal.style.display = "block";
	});

	closeMember.addEventListener('click', function() {
		modal.style.display = "none";
	});

	window.addEventListener('click', function(e) {
		if (e.target == modal) {
			modal.style.display = "none";
		}
	});
};




