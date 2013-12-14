<?php
// Define Pimple DI container

use Slim\Slim;
use Slim\Views\Twig;

$c = new Pimple();

$c['config'] = require dirname(__FILE__) . '/../config/config.php';
require_once $c['config']['path.models'] . 'Users.php';

$c['app'] = $c->share(function ($c) {
    $app = new Slim(array(
        'view' => new Twig(),
        'templates.path' => $c['config']['path.templates']
    ));
    return $app;
});

//$c['db.pdo'] = function ($c) {
//    $config = $c['config'];
//    switch (substr($config['db.dsn'], 0, 5)) {
//        // MySQL database
//        case 'mysql':
//            $db = new \PDO(
//                $config['db.dsn'],
//                $config['db.username'],
//                $config['db.password'],
//                array(
//                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                    PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8mb4'
//                )
//            );
//            break;
//
//        // SQLite database
//        case 'sqlit':
//            $db = new PDO($config['db.dsn']);
//            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            break;
//
//        default:
//            throw new UnexpectedValueException('Unknown database');
//    }
//    return $db;
//};

//$c['db.orm'] = function ($c) {
//    $config = $c['config'];
//
//    $db = Capsule\Database\Connection::make('default', array(
//        'driver'    => 'mysql',
//        'host'      => 'localhost',
//        'port'      => 3306,
//        'database'  => 'test',
//        'username'  => $config['db.username'],
//        'password'  => $config['db.password'],
//        'prefix'    => '',
//        'charset'   => "utf8",
//        'collation' => "utf8mb4",
//    ), true);
//
//    return $db;
//};


//$c['db'] = function ($c) {
//    return new NotORM($c['db.pdo']);
//};

use Illuminate\Database\Capsule\Manager as Capsule;

$config = $c['config'];
$conn =  array(
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'port'      => 3306,
    'database'  => 'test',
    'username'  => $config['db.username'],
    'password'  => $config['db.password'],
    'prefix'    => '',
    'charset'   => "utf8",
    'collation' => "utf8_general_ci",
);

$capsule = new Capsule;
$capsule->addConnection($conn);
$capsule->bootEloquent();
$capsule->setAsGlobal();


return $c;
