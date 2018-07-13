<?php

namespace projet4\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
        
    public function getPosts()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y %H:%i:%s") AS date_fr FROM posts  ORDER BY creation_date DESC LIMIT 0,5');
        return $req;
    }
    public function getPost($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y %H:%i:%s") AS date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function updatePost($title, $content, $postId) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $updated = $req->execute(array($title, $content, $postId));
        return $updated;
    }

}