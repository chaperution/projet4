<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');
require_once('model/ReportManager.php');


function listPosts() {
    $postManager = new \projet4\Blog\Model\PostManager(); 
    $posts = $postManager->getPosts(); 

    require('view/frontend/homeView.php');
}

function post() {
    $postManager = new \projet4\Blog\Model\PostManager();
    $commentManager = new \projet4\Blog\Model\CommentManager();
    $reportManager = new \projet4\Blog\Model\ReportManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    if (!empty($_SESSION)) {
    	$idComment = $reportManager->getIdReports($_SESSION['id']);
    }

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment) {
    $commentManager = new \projet4\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception("Impossible d'ajouter le commentaire !");
    }
    else {
        header('Location: index.php?action=post&id=' . $postId . '#commentsFrame');
    }
}

function postReport($postId, $commentId, $memberId) {
	$reportManager = new \projet4\Blog\Model\ReportManager();

	$reported = $reportManager->postReports($commentId, $memberId);

	header('Location: index.php?action=post&id=' . $postId . '&report=success#commentsFrame');
	// condition de 5 reports
}

function displaySubscribe() {
	require('view/frontend/subscribeView.php');
}

function addMember($pseudo, $pass, $mail) {
	$memberManager = new \projet4\Blog\Model\MemberManager();

	$usernameValidity = $memberManager->checkPseudo($pseudo);
	$mailValidity = $memberManager->checkMail($mail);

	if ($usernameValidity) {
		//throw new Exception("Ce pseudo est déjà utilisé !");
		header('Location: index.php?action=subscribe&error=invalidUsername');	
	}

	if ($mailValidity) {
		header('Location: index.php?action=subscribe&error=invalidMail');
		//throw new Exception("Cette adresse mail est déjà utilisée !");
	}


	if (!$usernameValidity && !$mailValidity) {
		// Hachage du mot de passe
		$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		
		$newMember = $memberManager->createMember($pseudo, $pass, $mail);
		
		// redirige vers page d'accueil avec le nouveau paramètre
		header('Location: index.php?account-status=account-successfully-created');
	}	
}

function displayLogin() {
	require('view/frontend/loginView.php');
}

function loginSubmit($pseudo, $pass) {
	$memberManager = new \projet4\Blog\Model\MemberManager();

	$member = $memberManager->loginMember($pseudo);

	$isPasswordCorrect = password_verify($_POST['pass'], $member['pass']);

	if (!$member) {
        echo '<p>Mauvais identifiant ou mot de passe !</p>';
    }
    else {
    	if ($isPasswordCorrect) {
    		//session_start();
    		$_SESSION['id'] = $member['id'];
    		$_SESSION['pseudo'] = $pseudo;
    		$_SESSION['groups_id'] = $member['groups_id'];
    		echo 'Vous êtes connecté !';
    		header('Location: index.php');
    		// faire lien vers page profil
    		// header('Location: profil.php?id= . $_SESSION['id']');
    	}
        else {
        	echo '<p>Mauvais identifiant ou mot de passe !</p>';
        }
    }
}

function logout() {
	$_SESSION = array();
	setcookie(session_name(), '', time() - 42000);
	session_destroy();

	header('Location: index.php?logout=success');
}

function displayAbout() {
	require('view/frontend/aboutView.php');
}



