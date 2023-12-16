<?php

return [
    'connection' => [
        'driver'    => $_ENV['DB_CONNECTION'],
        'host'      => $_ENV['DB_HOST'],
        'database'  => $_ENV['DB_DATABASE'],
        'username'  => $_ENV['DB_USERNAME'],
        'password'  => $_ENV['DB_PASSWORD'],
        'port' => $_ENV['DB_PORT'],
        'charset'   => 'utf8',
        'collation'   => 'utf8_unicode_ci',
        'prefix' => ''
    ],
    'migration_table' => 'migrations',
    'migration_path' => '%%PHINX_CONFIG_DIR%%/database/migrations',
    'seed_path' => '%%PHINX_CONFIG_DIR%%/database/seeds',
];