<?php
$basedir = __DIR__ . '/../';

return array(
// Environment
    'php.error_reporting' => E_ALL,
    'php.display_errors'  => true,
    'php.log_errors'      => true,
    'php.error_log'       => $basedir . 'logs/errors.txt',
    'php.date.timezone'   => 'Europe/London',

// SQLite
//    'db.dsn'              => 'sqlite:' . $basedir . 'db/sqlite.db',

// MySQL
    'db.dsn'              => 'mysql:host=localhost;dbname=test',
    'db.username'         => 'root',
    'db.password'         => 'root',

// Application paths
    'path.routes'         => $basedir . 'routes/',
    'path.templates'      => $basedir . 'templates/',
    'path.models'         => $basedir . 'models/',
    'path.libraries'      => $basedir . 'lib/',
);
