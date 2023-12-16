<?php

require_once __DIR__.'/app/bootstrap.php';

$config = config('database');

return
[
    'paths' => [
        'migrations' => $config['migration_path'],
        'seeds' => $config['migration_path']
    ],
    'environments' => [
        'default_migration_table' => $config['migration_table'],
        'development' => [
            'adapter' => $config['connection']['driver'],
            'host' => $config['connection']['host'],
            'name' => $config['connection']['database'],
            'user' => $config['connection']['username'],
            'pass' => $config['connection']['password'],
            'port' => $config['connection']['port'],
            'charset' => $config['connection']['charset'],
            'collation' => $config['connection']['collation'],
            'prefix' => $config['connection']['prefix'],
        ],
    ],
    'version_order' => 'creation'
];
