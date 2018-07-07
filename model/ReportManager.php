<?php

namespace projet4\Blog\Model;

require_once("model/Manager.php");

class ReportManager extends Manager{

	public function getIdReports($memberId) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT comment_id FROM reports WHERE member_id = ?');
        $req->execute(array($memberId));
        $reports = $req->fetchAll(\PDO::FETCH_ASSOC);
       	$idComment = array();
       	foreach ($reports as $value) {
       		$idComment[] = $value['comment_id'];
       	}

        return $idComment;
    }

    public function postReports($commentId, $memberId) {
    	$bdd = $this->dbConnect();
    	$req = $bdd->prepare('INSERT INTO reports(comment_id, member_id, report_date) VALUES(?, ?, NOW())');
    	$reported = $req->execute(array($commentId, $memberId));
    	//$reported = $req->fetch();

    	return $reported;
    }

}

