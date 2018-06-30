<?php
require('controller/frontend.php');
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
	            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
	                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
	            }
	            else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
	            }
	        }else {
                throw new Exception('Aucun identifiant de billet envoyé');
	        }
	    } 
	    elseif ($_GET['action'] == 'addMember') {
			if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['mail'])) {
				if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
					addMember($_POST['pseudo'], $_POST['pass'], $_POST['mail']);
				} else {
					throw new Exception('Pas d\'adresse mail valide.');
				}
			} else {
				throw new Exception('Tous les champs ne sont pas remplis !');
			}
		} elseif ($_GET['action'] == 'login') {
			displayLogin();
		}

	}
	else {
	    listPosts();
	}
} catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
}