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

}

