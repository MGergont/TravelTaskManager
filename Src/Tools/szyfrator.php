<?php

declare(strict_types=1);

namespace Src\Tools;
use Src\Utils\Encryption;

require_once 'Src/Utils/Encryption.php';

$plain_password = 'hasło do zaszyfrowania';
$encrypted_password = Encryption::encrypt($plain_password);

echo "Zaszyfrowane hasło: " . $encrypted_password;