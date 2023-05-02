<?php

namespace App\Controller;

use App\Model\UserModel;

Class UserController{
    
    public $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function findAll()
    {
       $users = $this->user->selectAll();
        echo $users;
    }
}

?>