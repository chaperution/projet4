<?php

//require_once();
require_once('model/PostManager.php');

function displayLoginAdmin() {
	require('view/frontend/adminLoginView.php');
}

function loginAdmin() {
	if (isset($_POST['pass']) AND $_POST['pass'] == "KFg54OpER1Gk7") {
		header('Location: index.php?action=admin');
	} else {
		header('Location: index.php?action=admin-login-view');
	}
}

function displayAdmin() {
	$postManager = new \projet4\Blog\Model\PostManager(); 
	$reportManager = new \projet4\Blog\Model\ReportManager();
	$memberManager = new \projet4\Blog\Model\MemberManager();

    $posts = $postManager->getPosts(); 
    $reports = $reportManager->getReports();
    $members = $memberManager->getMembers();

	require('view/backend/adminView.php');
}

function displayUpdate() {
	$postManager = new \projet4\Blog\Model\PostManager();

	$post = $postManager->getPost($_GET['id']);
	require('view/backend/updatePostView.php');
}

function submitUpdate($title, $content, $postId) {
	$postManager = new \projet4\Blog\Model\PostManager();
	
	$updated = $postManager->updatePost($title, $content, $postId);

	Header('Location: index.php?action=admin');
}

function displayCreatePost() {
	require('view/backend/createPostView.php');
}

function newPost($title, $content) {
	$postManager = new \projet4\Blog\Model\PostManager();

	$newPost = $postManager->createPost($title, $content);

	Header('Location: index.php?action=admin');
}

function removePost($postId) {
	$postManager = new \projet4\Blog\Model\PostManager();

	$deletedPost = $postManager->deletePost($postId);

	Header('Location: index.php?action=admin');
}

function removeComment($commentId) {
	$commentManager = new \projet4\Blog\Model\CommentManager();

	$deletedComment = $commentManager->deleteComment($commentId);

	Header('Location: index.php?action=admin');
}

function removeMember($memberId) {
	$memberManager = new \projet4\Blog\Model\MemberManager();

	$deletedMember = $memberManager->deleteMember($memberId);

	Header('Location: index.php?action=admin');	
}