<?php

//require_once();

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
	require('view/backend/adminView.php');
}