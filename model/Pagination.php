<?php

namespace projet4\Blog;

require_once("model/Manager.php");

class Pagination extends Manager
{ 

	public function getPostsPagination() {
        $bdd = $this->dbConnect();
        $totalPosts = $bdd->query('SELECT COUNT(id) AS nbPosts FROM posts');
   
        return $totalPosts->fetch()['nbPosts'];
    }

    public function getPostsPages($nbPosts, $postsPerPage) {  
        $nbPage = ceil($nbPosts/$postsPerPage);

        return $nbPage;
    }
}
