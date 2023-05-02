<?php

require './vendor/autoload.php';

$router = new AltoRouter();

$router->setBasePath('/super-week');

$router->map('GET', '/', function()  {
    require_once 'home.php';
}, 'home' );


$match = $router->match();

if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>