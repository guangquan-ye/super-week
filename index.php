<?php

require_once './vendor/autoload.php';

use App\Controller\BookController;
use App\Controller\UserController;

session_start();

$router = new AltoRouter();

$router->setBasePath('/super-week');

$router->map('GET', '/', function(){
    require_once 'home.php';
}, 'home');

$router->map('GET', '/users', function(){
    $user = new UserController();
    $users = $user->findAll();
    echo $users; 
}, 'users');

$router->map('GET', '/register', function(){
    $user = new UserController();
    $user->regFormDisplay();
}, 'regFormDisplay');

$router->map('POST', '/register', function(){
    if(isset($_POST["regBtn"])){
        $user = new UserController();
        $user->createUsers($_POST["regEmail"], $_POST["regPwd"], $_POST["regFirstname"], $_POST["regLastname"], $_POST["regPwdConf"]);
    }
}, 'usersregister');

$router->map('GET', '/login', function(){
    $user = new UserController();
    $user->logFormDisplay();
}, 'logFormDisplay');

$router->map('POST', '/login' , function(){
    if(isset($_POST["logBtn"])){
    $user = new UserController();
    $user->connect($_POST["logEmail"], $_POST["logPwd"]);
    }
}, 'userslogin');
$router->map('GET', '/users/[i:id]', function($id){
    $user = new UserController();
    $users = $user->findOne($id);
    echo $users;
}, 'users/id');

$router->map('GET', '/books/add', function(){
    var_dump($_SESSION["user"]);
    $book = new BookController();
    $book->addBookFormDisplay();
}, 'addBookFormDisplay');

$router->map('POST', '/books/add', function(){
    
    if(isset($_POST["addBookBtn"])){
        $book = new BookController();
        $book->addBook($_POST["addBookTitle"], $_POST["addBookContent"], $_SESSION["user"]["id"]);
    }
},'addBook');

$router->map('GET', '/books', function(){
    $book = new BookController();
    $books = $book->getBooks();
    echo $books;
}, 'getBooks');

$router->map('GET', '/books/[i:id]', function($id){
    $book = new BookController();
    $oneBook = $book->getOneBook($id);

    echo $oneBook;
}, 'getOneBook');

$router->map('GET', '/deco', function(){
    session_destroy();
}, 'deconnexion');

$match = $router->match();

if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>