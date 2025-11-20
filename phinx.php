<?php

declare(strict_types=1);


require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/Src/Tools/bootstrap.php';

return [
    'paths' => [
        'migrations' => 'db/migrations',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'production',
        'production' => [
            'adapter' => 'pgsql',
            'host' => DB_HOST,
            'name' => DB_NAME,
            'user' => DB_USER,
            'pass' => DB_PASS,
            'port' => DB_PORT,
        ],
    ],
];