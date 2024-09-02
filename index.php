<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

if(!isset($_SESSION)){
    session_start();
}

$router = new Src\Utils\Router();
//obsługa błędów
$router->get('/access-denied', 'HomeController@accessDenied', 'Controllers');

//logowanie user
$router->get('/', 'LoginController@loginView', 'Controllers\\user');

//przerobić nemaspace na osobną funkcję
$router->post('/admin', 'LoginAdminController@login', 'Controllers\\admin');



