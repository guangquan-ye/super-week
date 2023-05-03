<?php

namespace App\Model;

use App\Model\Dbconnexion;

Class UserModel{

    public function __construct()
    {

    }

    public function SelectAll()
    {

        $select = "SELECT * FROM user";
        $prepare = DbConnexion::getDb()->prepare($select);
        $prepare->execute();
        $result = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        
        return json_encode($result);
    }
    
    public function selectOne($email)
    {
        $select ="SELECT * FROM user WHERE email = :email";
        $prepare = DbConnexion::getDb()->prepare($select);
        $prepare->execute([
            "email" => $email
        ]);
        $result = $prepare->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function verifyExist($email)
    {
        $select = "SELECT COUNT(email) FROM user WHERE email = :email";
        $prepare = DbConnexion::getDb()->prepare($select);
        $prepare->execute([
            "email" => $email
        ]);
        $result = $prepare->fetchColumn();
        
        return $result > 0;

    }

    public function insert($email, $password, $firstname, $lastname){
        
            $insert = "INSERT INTO user (email, password, first_name, last_name) VALUES (:email, :password, :firstname, :lastname)";
            $prepare = DbConnexion::getDb()->prepare($insert);
            $prepare->execute([
                "email" => $email,
                "password" => $password,
                "firstname" => $firstname,
                "lastname" => $lastname,
            ]);
            
    }

    
}