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

	// Hachage du mot de passe
	$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

	$newMember = $subscribeManager->createMember($pseudo, $pass, $mail);

	// vérification validité du pseudo et du mail p/r à la bdd
	if (strtolower($_POST['pseudo']) == strtolower($pseudo['pseudo'])) {
		throw new Exception("Ce pseudo est déjà utilisé !");
	} elseif (strtolower($_POST['mail']) == strtolower($mail['mail'])) {
		throw new Exception("Cette adresse mail est déjà utilisée !");
	}
}

function displayLogin() {
	require('view/frontend/loginView.php');
}

function login($pseudo, $pass) {
	$loginManager = new \projet4\Blog\Model\LoginManager();

	$member = $loginManager->loginMember($pseudo);

	// Comparaison du pass envoyé via le formulaire avec la base
	$isPasswordCorrect = password_verify($_POST['pass'], $member['pass']);
}