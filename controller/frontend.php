<?php

// namespaces utilisés
use \projet4\Blog\Autoloader;
use \projet4\Blog\PostManager;
use \projet4\Blog\Pagination;
use \projet4\Blog\CommentManager;
use \projet4\Blog\ReportManager;
use \projet4\Blog\MemberManager;

require_once 'Autoloader.php';
Autoloader::register();

function listPosts() {
    $pagination = new Pagination();
	$postManager = new PostManager();

	$postsPerPage = 4;

	$nbPosts = $pagination->getPostsPagination();
	$nbPage = $pagination->getPostsPages($nbPosts, $postsPerPage);

	if (!isset($_GET['page'])) {
		$cPage = 0;
	} else {
		if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPage) {
			$cPage = (intval($_GET['page']) - 1) * $postsPerPage;
		}
	}
	
    $posts = $postManager->getPosts($cPage, $postsPerPage);

    require('view/frontend/homeView.php');
}

function post() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $reportManager = new ReportManager();

    $post = $postManager->getPost($_GET['id']);

    if ($post) {
    	$comments = $commentManager->getComments($_GET['id']);

	    if (!empty($_SESSION)) {
	    	$idComment = $reportManager->getIdReports($_SESSION['id']);
	    }
    } else {
    	header('Location: index.php');
    }
    

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment) {
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception("Impossible d'ajouter le commentaire !");
    }
    else {
        header('Location: index.php?action=post&id=' . $postId . '#commentsFrame');
    }
}

function postReport($postId, $commentId, $memberId) {
	$reportManager = new ReportManager();

	$reported = $reportManager->postReports($commentId, $memberId);

	header('Location: index.php?action=post&id=' . $postId . '&report=success#commentsFrame');
}

function displaySubscribe() {
	require('view/frontend/subscribeView.php');
}

function addMember($pseudo, $pass, $mail) {
	$memberManager = new MemberManager();

	$reCaptcha = $memberManager->getReCaptcha($_POST['g-recaptcha-response']);
	
	if ($reCaptcha->success == true) {
		$usernameValidity = $memberManager->checkPseudo($pseudo);
		$mailValidity = $memberManager->checkMail($mail);

		if ($usernameValidity) {
			header('Location: index.php?action=subscribe&error=invalidUsername');	
		}

		if ($mailValidity) {
			header('Location: index.php?action=subscribe&error=invalidMail');
		}

		if (!$usernameValidity && !$mailValidity) {
			// Hachage du mot de passe
			$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
			
			$newMember = $memberManager->createMember($pseudo, $pass, $mail);
			
			// redirige vers page d'accueil avec le nouveau paramètre
			header('Location: index.php?account-status=account-successfully-created');
		}	
	} else {
		header('Location: index.php?action=subscribe&error=google-recaptcha');
	}
	
	
}

function displayLogin() {
	require('view/frontend/loginView.php');
}

function loginSubmit($pseudo, $pass) {
	$memberManager = new MemberManager();

	$member = $memberManager->loginMember($pseudo);

	$isPasswordCorrect = password_verify($_POST['pass'], $member['pass']);

	if (!$member) {
        header('Location: index.php?action=login&account-status=unsuccess-login');
    }
    else {
    	if ($isPasswordCorrect) {
    		$_SESSION['id'] = $member['id'];
    		$_SESSION['pseudo'] = ucfirst(strtolower($pseudo));
    		$_SESSION['groups_id'] = $member['groups_id'];
    		header('Location: index.php');
    	}
        else {
        	header('Location: index.php?action=login&account-status=unsuccess-login');
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

function displayPrivacy() {
	require('view/frontend/privacyView.php');
}

