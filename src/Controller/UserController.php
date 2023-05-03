<?php

namespace App\Controller;

use App\Model\UserModel;

Class UserController{
    
    public $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function createUsers($email, $password, $firstname, $lastname, $passwordConf)
    {

        if($password == $passwordConf){
            
            if($this->user->verifyExist($email)){

            }else{
                $this->user->insert($email, $password, $firstname, $lastname);
            }
        }
    }
    public function findAll()
    {
        
        return $this->user->selectAll();
    }

    public function regFormDisplay(){

        require_once "./src/View/register.php";
    }
}
