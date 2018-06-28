<?php

// Chargement des classes
require_once('model/PostManager.php');
//require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \projet4\Blog\Model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction membre de cet objet

    require('view/frontend/homeView.php');
}