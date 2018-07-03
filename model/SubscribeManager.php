<?php

namespace projet4\Blog\Model;

require_once("model/Manager.php");

class SubscribeManager extends Manager
{
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
        $newMember = $bdd->prepare('INSERT INTO members(pseudo, pass, mail, subscribe_date) VALUES (?, ?, ?, CURDATE())');
        $newMember->execute(array($pseudo, $pass, $mail));

        return $newMember;
    }
}