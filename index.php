<?php

require_once './vendor/autoload.php';

use App\Controller\UserController;

$router = new AltoRouter();

$router->setBasePath('/super-week');

$router->map('GET', '/', function()  {
    require_once 'home.php';
}, 'home' );

$router->map('GET', '/users', function(){
    $controller = new UserController();
    $users = $controller -> findAll();
    echo $users;  
}, 'users');

$router->map('GET', '/users/[i:id]', function($id){
    echo "<h1> Bienvenudos user $id</h1>";
}, 'users/id');

$match = $router->match();

if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>