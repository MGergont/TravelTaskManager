<?php

declare(strict_types=1);

namespace Src\Tools;
use Src\Utils\Encryption;

require_once __DIR__ . '/../Utils/Encryption.php';

if ($argc < 2) {
    echo "Użycie: php hash.php <hasło>\n";
    exit(1);
}

$plain_password = $argv[1];

$encrypted_password = Encryption::encrypt($plain_password);

echo "Zaszyfrowane hasło: " . $encrypted_password;