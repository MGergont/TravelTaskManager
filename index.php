<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

require_once 'Src\Utils\SessionHelpers.php';

$router = new Src\Utils\Router();
//TODOobsługa błędów
$router->get('/access-denied', 'HomeController@accessDenied', 'Controllers');


//TODOlogowanie user
$router->get('/', 'LoginOperatorController@loginView', 'Controllers\\Operator');

//TODO tymczasowa rejestracja
$router->get('/register', 'AddOperatorController@AddOperatorView', 'Controllers\\Admin');
$router->post('/register', 'AddOperatorController@AddOperator', 'Controllers\\Admin');

//TODOprzerobić nemaspace na osobną funkcję
$router->get('/admin', 'LoginAdminController@loginView', 'Controllers\\Admin');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($uri);

