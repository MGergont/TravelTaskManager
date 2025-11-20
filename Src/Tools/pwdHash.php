<?php

declare(strict_types=1);

namespace Src\Tools;
use Src\Utils\Encryption;

if ($argc < 2) {
    echo "Użycie: php hash.php <hasło>\n";
    exit(1);
}

$password = $argv[1];

$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Hasło: $password\n";
echo "Hash:   $hash\n";