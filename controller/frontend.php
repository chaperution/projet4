<?php


require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/SubscribeManager.php');
require_once('model/LoginManager.php');

function listPosts() {
    $postManager = new \projet4\Blog\Model\PostManager(); 
    $posts = $postManager->getPosts(); 

    require('view/frontend/homeView.php');
}

function post() {
    $postManager = new \projet4\Blog\Model\PostManager();
    $commentManager = new \projet4\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment) {
    $commentManager = new \projet4\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception("Impossible d'ajouter le commentaire !");
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function addMember($pseudo, $pass, $mail) {
	$subscribeManager = new \projet4\Blog\Model\SubscribeManager();

	$usernameValidity = $subscribeManager->checkPseudo($pseudo);
	$mailValidity = $subscribeManager->checkMail($mail);

	if ($usernameValidity) {
		//throw new Exception("Ce pseudo est déjà utilisé !");
		header('Location: index.php?action=subscribe&error=invalidUsername');
		
	}
	print_r('usernameValidity' . $usernameValidity);

	if ($mailValidity) {
		header('Location: index.php?action=subscribe&error=invalidMail');
		//throw new Exception("Cette adresse mail est déjà utilisée !");
		
	}
	print_r('mailValidity' . $mailValidity);

	if (!$usernameValidity && !$mailValidity) {
		// Hachage du mot de passe
		$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

		$newMember = $subscribeManager->createMember($pseudo, $pass, $mail);
		
		// redirige vers page d'accueil avec le nouveau paramètre
		header('Location: index.php?account-status=account-successfully-created');
	}	
	
}

function displayLogin() {
	require('view/frontend/loginView.php');
}

function loginSubmit($pseudo, $pass) {
	$loginManager = new \projet4\Blog\Model\LoginManager();

	$member = $loginManager->loginMember($pseudo);

	$isPasswordCorrect = password_verify($_POST['pass'], $member['pass']);

	if (!$member) {
        throw new Exception("Mauvais identifiant ou mot de passe !");
    }
    else {
    	if ($isPasswordCorrect) {
    		session_start();
    		$_SESSION['id'] = $member['id'];
    		$_SESSION['pseudo'] = $pseudo;
    		echo 'Vous êtes connecté !';
    		header('Refresh: 3; url=index.php');
    	}
        else {
        	throw new Exception("Mauvais identifiant ou mot de passe !");
        }
    }
}

function displaySubscribe() {
	require('view/frontend/subscribeView.php');
}