<?php

namespace projet4\Blog\Model;

require_once("model/Manager.php");

class LoginManager extends Manager
{

    public function loginMember($pseudo)
    {
        $bdd = $this->dbConnect();
        $member = $bdd->prepare('SELECT id, pass FROM members WHERE pseudo = ?');
        $member->execute(array($pseudo));

        return $member;
    }
}