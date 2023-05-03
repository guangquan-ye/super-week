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
    public function findOne($id)
    {
        return $this->user->selectOne($id);
    }

    public function ifExist($email)
    {
        return $this->user->ifEmailExist($email);
    }

    public function regFormDisplay(){

        require_once "./src/View/register.php";
    }

    public function logFormDisplay()
    {
        require_once "./src/View/login.php";
    }

    public function connect($email, $password){

      $result = $this->ifExist($email);
       if($result["password"] == $password){
        $_SESSION["user"] = [
            "id" => $result["id"],
            "firstname" => $result["first_name"],
            "lastname" => $result["last_name"],
            "email" => $result["email"],
        ];
        var_dump($_SESSION["user"]);
       }
    }
}
