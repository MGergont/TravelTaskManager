<?php

declare(strict_types=1);

namespace Src\Config;

return [
    'smtp_host' => SMTP_HOST,
    'smtp_port' => SMTP_PORT,
    'smtp_user' => SMTP_USER,
    'smtp_encrypted_password' => SMTP_PWD_CRYPT,
    'smtp_secure' => SMTP_TYP_CONECT,
    'smtp_from' => SMTP_USER_FROM,
    'smtp_from_name' => SMTP_FROM_NAME,
];