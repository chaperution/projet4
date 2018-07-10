<?php

session_start();

require('controller/frontend.php');
require('controller/backend.php');

try {
	if (isset($_GET['action'])) {
	    if ($_GET['action'] == 'listPosts') {
	        listPosts();
	    }
	    elseif ($_GET['action'] == 'post') {
	        if (isset($_GET['id']) && $_GET['id'] > 0) {
	            post();
	        }
	        else {
                throw new Exception('Aucun identifiant de billet envoyé');
	        }
		} 
		elseif ($_GET['action'] == 'addComment') {
	    	if (isset($_GET['id']) && $_GET['id'] > 0) {
	            if (!empty($_SESSION['pseudo']) && !empty($_POST['comment'])) {
	                addComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
	            }
	            else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
	            }
	        }else {
                throw new Exception('Aucun identifiant de billet envoyé');
	        }
	    } 
	    elseif ($_GET['action'] == 'subscribe') {
			displaySubscribe();
		}
	    elseif ($_GET['action'] == 'addMember') {
			if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass_confirm']) && !empty($_POST['mail'])) {
				if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
					if ($_POST['pass'] == $_POST['pass_confirm']) {
						addMember(strip_tags($_POST['pseudo']), strip_tags($_POST['pass']), strip_tags($_POST['mail']));
					}
					else {
						throw new Exception('Les deux mots de passe ne correspondent pas.');
					}
				} else {
					throw new Exception('Pas d\'adresse mail valide.');
				}
			} else {
				throw new Exception('Tous les champs ne sont pas remplis !');
			}
		} 
		elseif ($_GET['action'] == 'login') {
			displayLogin();
		}
		elseif ($_GET['action'] == 'loginSubmit') {
			loginSubmit(strip_tags($_POST['pseudo']), strip_tags($_POST['pass']));
		}
		elseif ($_GET['action'] == 'logout') {
			logout();
		}
		elseif ($_GET['action'] == 'report') {
			postReport($_GET['id'], $_GET['comment-id'], $_SESSION['id']);
		}
		elseif ($_GET['action'] == 'about') {
			displayAbout();
		} 
		elseif ($_GET['action'] == 'admin-login-view') {
			displayLoginAdmin();
		}
		elseif ($_GET['action'] == 'adminLogin') {
			loginAdmin();
		}
		elseif ($_GET['action'] == 'admin') {
			displayAdmin();
		}

		
	}
	else {
	    listPosts();
	}
} catch(Exception $e) { 	
    echo 'Erreur : ' . $e->getMessage();
}

