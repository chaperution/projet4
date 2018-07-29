<?php
namespace projet4\Blog;

class Manager {
	protected function dbConnect()
    {
        $bdd = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        
        return $bdd;
    }
}