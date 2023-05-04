<?php

require_once './vendor/autoload.php';

use App\Controller\UserController;

$router = new AltoRouter();

$router->setBasePath('/super-week');

$router->map('GET', '/', function(){
    require_once 'home.php';
}, 'home');

$router->map('GET', '/users', function(){
    $controller = new UserController();
    $users = $controller -> findAll();
    echo $users;  
}, 'users');

$router->map('GET', '/register', function(){
    $controller = new UserController();
    $controller->regFormDisplay();
}, 'regFormDisplay');

$router->map('POST', '/register', function(){
    if(isset($_POST["regBtn"])){
        $controller = new UserController();
        $controller->createUsers($_POST["regEmail"], $_POST["regPwd"], $_POST["regFirstname"], $_POST["regLastname"], $_POST["regPwdConf"]);
    }
}, 'usersregister');

$router->map('GET', '/login', function(){
    $controller = new UserController();
    $controller->logFormDisplay();
}, 'logFormDisplay');

$router->map('POST', '/login' , function(){
    if(isset($_POST["logBtn"])){
    $controller = new UserController();
    $controller->connect($_POST["logEmail"], $_POST["logPwd"]);
    }
}, 'userslogin');
$router->map('GET', '/users/[i:id]', function($id){
    $controller = new UserController();
    $controller->findOne($id);
    var_dump($controller->findOne($id));
}, 'users/id');

$match = $router->match();

if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>