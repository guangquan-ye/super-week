<?php

namespace App\Model;

use App\Model\Dbconnexion;

Class UserModel{

    public function __construct()
    {

    }

    public function SelectAll(){

        $select = "SELECT * FROM user";
        $prepare = DbConnexion::getDb()->prepare($select);
        $prepare->execute();
        $result = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        
        return json_encode($result);
    }
}