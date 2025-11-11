<?php

namespace Script;

use Dotenv\Dotenv;
use PDO;
use PDOException;

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Src/Tools/bootstrap.php';

$host = DB_HOST;
$port = DB_PORT;
$db   = DB_NAME;
$user = DB_USER;
$pass = DB_PASS;

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Połączenie do bazy danych działa poprawnie.\n";
} catch (PDOException $e) {
    echo "Błąd połączenia do bazy danych: " . $e->getMessage() . "\n";
    exit(1);
}
