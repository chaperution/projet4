<?php

namespace projet4\Blog\Model;

require_once("model/Manager.php");

class LoginManager extends Manager
{

    public function loginMember($pseudo)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, pass FROM members WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $member = $req->fetch();

        return $member;
    }
}