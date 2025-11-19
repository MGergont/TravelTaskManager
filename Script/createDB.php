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
    $dsn = "pgsql:host=$host;port=$port;";
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $pdo->exec("CREATE DATABASE \"$db\"");
    echo "Baza danych '$db' została utworzona. OK\n";
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'already exists') !== false) {
        echo "Baza '$db' już istnieje, pomijam tworzenie. OK\n";
    } else {
        echo "Błąd przy tworzeniu bazy danych: " . $e->getMessage() . "\n";
        exit(1);
    }
}
