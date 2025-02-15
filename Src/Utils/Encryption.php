<?php

declare(strict_types=1);

namespace Src\Utils;

class Encryption {
    private const SECRET_KEY = 'frazaszyfrująca';
    private const SECRET_IV = '16 bitowy klucz';

    public static function encrypt($data) {
        $key = hash('sha256', self::SECRET_KEY, true); // RAW output
        $iv = substr(hash('sha256', self::SECRET_IV, true), 0, 16); // RAW output, 16 bajtów
        return base64_encode(openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv));
    }

    public static function decrypt($data) {
        $key = hash('sha256', self::SECRET_KEY, true);
        $iv = substr(hash('sha256', self::SECRET_IV, true), 0, 16);
        return openssl_decrypt(base64_decode($data), 'AES-256-CBC', $key, 0, $iv);
    }
}