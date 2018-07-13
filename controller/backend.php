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
