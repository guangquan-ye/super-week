<?php

require './vendor/autoload.php';

$router = new AltoRouter();

$router->setBasePath('/super-week');

$router->map('GET', '/', function (){
    require_once 'home.html';
}, 'home' );

?>