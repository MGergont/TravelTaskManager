<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$db   = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];

try {
    // Połączenie bez określonej bazy, żeby móc ją utworzyć
    $dsn = "pgsql:host=$host;port=5432;dbname=postgres";
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Utworzenie bazy jeśli nie istnieje
    $pdo->exec("CREATE DATABASE \"$db\"");
    echo "✅ Baza danych '$db' została utworzona.\n";
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'already exists') !== false) {
        echo "Baza '$db' już istnieje, pomijam tworzenie.\n";
    } else {
        echo "Błąd przy tworzeniu bazy danych: " . $e->getMessage() . "\n";
        exit(1);
    }
}
