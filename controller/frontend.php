<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');
require_once('model/ReportManager.php');
require_once('model/Pagination.php');


function listPosts() {
    $postManager = new \projet4\Blog\Model\PostManager();
    $pagination = new \projet4\Blog\Model\Pagination();
	$postManager = new \projet4\Blog\Model\PostManager();

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
    $postManager = new \projet4\Blog\Model\PostManager();
    $commentManager = new \projet4\Blog\Model\CommentManager();
    $reportManager = new \projet4\Blog\Model\ReportManager();

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
}

function displaySubscribe() {
	require('view/frontend/subscribeView.php');
}

function addMember($pseudo, $pass, $mail) {
	$memberManager = new \projet4\Blog\Model\MemberManager();

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
}

function displayLogin() {
	require('view/frontend/loginView.php');
}

function loginSubmit($pseudo, $pass) {
	$memberManager = new \projet4\Blog\Model\MemberManager();

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
    		echo 'Vous êtes connecté !';
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

