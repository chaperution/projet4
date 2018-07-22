<?php

//require_once();
require_once('model/PostManager.php');
require_once('model/Pagination.php');

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
	$postManager = new \projet4\Blog\Model\PostManager(); 
	$reportManager = new \projet4\Blog\Model\ReportManager();
	$memberManager = new \projet4\Blog\Model\MemberManager();
	$pagination = new \projet4\Blog\Model\Pagination();

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
	$postManager = new \projet4\Blog\Model\PostManager();

	$post = $postManager->getPost($_GET['id']);
	require('view/backend/updatePostView.php');
}

function submitUpdate($title, $content, $postId) {
	$postManager = new \projet4\Blog\Model\PostManager();
	
	$updated = $postManager->updatePost($title, $content, $postId);

	Header('Location: index.php?action=admin&update-status=success');
}

function displayCreatePost() {
	require('view/backend/createPostView.php');
}

function newPost($title, $content) {
	$postManager = new \projet4\Blog\Model\PostManager();

	$newPost = $postManager->createPost($title, $content);

	Header('Location: index.php?action=admin&new-post=success');
}

function removePost($postId) {
	$postManager = new \projet4\Blog\Model\PostManager();

	$deletedPost = $postManager->deletePost($postId);

	Header('Location: index.php?action=admin&remove-post=success');
}

function removeComment($commentId) {
	$commentManager = new \projet4\Blog\Model\CommentManager();

	$deletedComment = $commentManager->deleteComment($commentId);

	Header('Location: index.php?action=admin&remove-comment=success');
}

function removeMember($memberId) {
	$memberManager = new \projet4\Blog\Model\MemberManager();

	$deletedMember = $memberManager->deleteMember($memberId);

	Header('Location: index.php?action=admin&remove-member=success');	
}