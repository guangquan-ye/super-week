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

    public function selectAllBooks()
    {
        $select ="SELECT * FROM book";
        $prepare = DbConnexion::getDb()->prepare($select);
        $prepare->execute();
        $result = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        
       echo json_encode($result);

    }

    public function selectOneBook($id){

        $select ="SELECT * FROM book WHERE id = :id";
        $prepare = DbConnexion::getDb()->prepare($select);
        $prepare->execute([
            "id" => $id
        ]);
        $result = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        
       echo json_encode($result);
    }
}
?>