<?php
namespace App\Model;

use App\Model\Dbconnexion;

Class BookModel{

    public function __construct()
    {
        
    }

    public function insertBook($title, $content, $id_user)
    {
        $insert = "INSERT INTO book (title, content, id_user) VALUES (:title, :content, :id_user)";
        $prepare = DbConnexion::getDb()->prepare($insert);
        $prepare->execute([
            "title" => $title,
            "content" => $content,
            "id_user" => $id_user,
        ]);
    }

}
?>