<?php

namespace projet4\Blog\Model;

require_once("model/Manager.php");

class MemberManager extends Manager
{
    public function loginMember($pseudo)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, groups_id, pass FROM members WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $member = $req->fetch();

        return $member;
    }

    public function checkPseudo($pseudo) {
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT pseudo FROM members WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$usernameValidity = $req->fetch();

		return $usernameValidity;
	}

	public function checkMail($mail) {
		$bdd = $this->dbConnect();
		$req = $bdd->prepare('SELECT mail FROM members WHERE mail = ?');
		$req->execute(array($mail));
		$mailValidity = $req->fetch();

		return $mailValidity;
	}

    public function createMember($pseudo, $pass, $mail)
    {
        $bdd = $this->dbConnect();
        $newMember = $bdd->prepare('INSERT INTO members(groups_id, pseudo, pass, mail, subscribe_date) VALUES (2, ?, ?, ?, CURDATE())');
        $newMember->execute(array($pseudo, $pass, $mail));

        return $newMember;
    }

    public function getMembers() {
        $bdd = $this->dbConnect();
        $members = $bdd->query('SELECT id, groups_id, pseudo, DATE_FORMAT(subscribe_date, "%d/%m/%Y") AS date_sub FROM members ORDER BY id');

        return $members;
    }
}