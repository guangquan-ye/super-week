<?php
namespace App\Controller;

use App\Model\BookModel;

Class BookController
{
    public $book;

    public function __construct()
    {
        $this->book = new BookModel();
    }

    public function addBookFormDisplay()
    {
        require_once "./src/View/addbook.php";
    }
    public function addBook($title, $content, $id_user){

        $this->book->insertBook($title, $content, $id_user);
    }
}
?>