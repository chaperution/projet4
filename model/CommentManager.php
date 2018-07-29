<?php

namespace projet4\Blog;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('SELECT id, id_post, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %H:%i:%s") AS date_fra FROM comments WHERE id_post = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('INSERT INTO comments(id_post, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function deleteComment($commentId) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM comments WHERE id = ?');
        $deletedComment = $req->execute(array($commentId));

        return $deletedComment;
    }
   
}