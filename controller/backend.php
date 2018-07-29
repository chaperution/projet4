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

function displayLoginAdmin() {
	require('view/frontend/adminLoginView.php');
}

function loginAdmin() {
	if (isset($_POST['pass']) AND $_POST['pass'] == "TEST") {
		header('Location: index.php?action=admin');
	} else {
		header('Location: index.php?action=admin-login-view&account-status=unsuccess-login');
	}
}

function displayAdmin() {
	$postManager = new PostManager(); 
	$reportManager = new ReportManager();
	$memberManager = new MemberManager();
	$pagination = new Pagination();

	$postsPerPage = 6;

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
 
    $reports = $reportManager->getReports();
    $members = $memberManager->getMembers();

	require('view/backend/adminView.php');
}

function displayUpdate() {
	$postManager = new PostManager();

	$post = $postManager->getPost($_GET['id']);
	require('view/backend/updatePostView.php');
}

function submitUpdate($title, $content, $postId) {
	$postManager = new PostManager();
	
	$updated = $postManager->updatePost($title, $content, $postId);

	Header('Location: index.php?action=admin&update-status=success');
}

function displayCreatePost() {
	require('view/backend/createPostView.php');
}

function newPost($title, $content) {
	$postManager = new PostManager();

	$newPost = $postManager->createPost($title, $content);

	Header('Location: index.php?action=admin&new-post=success');
}

function removePost($postId) {
	$postManager = new PostManager();

	$deletedPost = $postManager->deletePost($postId);

	Header('Location: index.php?action=admin&remove-post=success');
}

function removeComment($commentId) {
	$commentManager = new CommentManager();

	$deletedComment = $commentManager->deleteComment($commentId);

	Header('Location: index.php?action=admin&remove-comment=success');
}

function removeMember($memberId) {
	$memberManager = new MemberManager();

	$deletedMember = $memberManager->deleteMember($memberId);

	Header('Location: index.php?action=admin&remove-member=success');	
}