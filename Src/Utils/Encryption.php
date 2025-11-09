<?php

declare(strict_types=1);

namespace Src\Utils;

require_once __DIR__ . '/../Tools/bootstrap.php';

class Encryption {
    
    public static function encrypt($data) {
        $key = hash('sha256', SECRET_IV_ENCRYPT, true); // RAW output
        $iv = substr(hash('sha256', SECRET_IV_ENCRYPT, true), 0, 16); // RAW output, 16 bajtów
        return base64_encode(openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv));
    }

    public static function decrypt($data) {
        $key = hash('sha256', SECRET_KEY_ENCRYPT, true);
        $iv = substr(hash('sha256', SECRET_IV_ENCRYPT, true), 0, 16);
        return openssl_decrypt(base64_decode($data), 'AES-256-CBC', $key, 0, $iv);
    }
}