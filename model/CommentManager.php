<?php

namespace projet4\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %H:%i:%s") AS date_fra FROM comments WHERE id_post = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $bdd = $this->dbConnect();
        // Effectuer ici la requête qui insère le message
        $comments = $bdd->prepare('INSERT INTO comments(id_post, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function getReports($memberId) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT comment_id FROM reports WHERE member_id = ?');
        $req->execute(array($memberId));
        $reports = $req;

        return $reports;
    }
}