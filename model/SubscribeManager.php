<?php

namespace projet4\Blog\Model;

require_once("model/Manager.php");

class SubscribeManager extends Manager
{
    public function createMember($pseudo, $pass, $mail)
    {
        $bdd = $this->dbConnect();
        $newMember = $bdd->prepare('INSERT INTO members(pseudo, pass, mail, DATE_FORMAT(subscribe_date, "%d/%m/%Y %H:%i:%s")) VALUES (?, ?, ?, CURDATE())');
        $newMember->execute(array($pseudo, $pass, $mail));

        return $newMember;
    }
}