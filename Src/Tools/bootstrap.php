<?php
namespace Src\Tools;

require_once __DIR__ . '/../../vendor/autoload.php';
use Dotenv\Dotenv;


// Inicjalizacja Dotenv
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

// Definiowanie stałych na podstawie `.env`
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);

define('SMTP_HOST', $_ENV['SMTP_HOST']);
define('SMTP_PORT', $_ENV['SMTP_PORT']);
define('SMTP_USER', $_ENV['SMTP_USER']);
define('SMTP_PWD_CRYPT', $_ENV['SMTP_PWD_CRYPT']);
define('SMTP_TYP_CONECT', $_ENV['SMTP_TYP_CONECT']);
define('SMTP_USER_FROM', $_ENV['SMTP_USER_FROM']);
define('SMTP_FROM_NAME', $_ENV['SMTP_FROM_NAME']);

define('SECRET_KEY_ENCRYPT', $_ENV['SECRET_KEY_ENCRYPT']);
define('SECRET_IV_ENCRYPT', $_ENV['SECRET_IV_ENCRYPT']);