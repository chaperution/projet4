<?php

namespace projet4\Blog;

require_once("model/Manager.php");

class PostManager extends Manager
{      
    public function getPosts($cPage, $postsPerPage)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y %H:%i:%s') AS date_fr, DATE_FORMAT(update_date, '%d/%m/%Y %H:%i:%s') AS update_date_fr FROM posts  ORDER BY creation_date DESC LIMIT $cPage, $postsPerPage");
        return $req;
    }

    public function getPost($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y %H:%i:%s") AS date_fr, DATE_FORMAT(update_date, "%d/%m/%Y %H:%i:%s") AS update_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function updatePost($title, $content, $postId) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE posts SET title = ?, content = ?, update_date = NOW() WHERE id = ?');
        $updated = $req->execute(array($title, $content, $postId));
        return $updated;
    }

    public function createPost($title, $content) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO posts(title, content, creation_date, update_date) VALUES (?, ?, NOW(), NOW())');
        $newPost = $req->execute(array($title, $content));

        return $newPost;
    }

    public function deletePost($postId) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM posts WHERE id = ?');
        $deletedPost = $req->execute(array($postId));

        return $deletedPost;
    }

}
