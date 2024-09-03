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
$router->get('/', 'LoginOperatorController@loginView', 'Controllers\\Operator');

//przerobić nemaspace na osobną funkcję
$router->get('/admin', 'LoginAdminController@loginView', 'Controllers\\Admin');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($uri);

