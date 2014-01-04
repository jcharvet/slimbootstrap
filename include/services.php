<?php

$c['config'] = require dirname(__FILE__) . '/../config/config.php';

/* MODELS */
require_once $c['config']['path.models'] . 'Users.php';

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => $c['config']['path.templates'],
));

$debug = ($c['config']['php.display_errors'] == true)?TRUE:FALSE;
$app->config('debug', $debug);

$app->error(function (\Exception $e) use ($app) {
    $app->render('error.html');
});

$app->notFound(function () use ($app) {
    $app->render('404.html');
});

// Create monolog logger and store logger in container as singleton
// (Singleton resources retrieve the same log resource definition each time)
    $app->container->singleton('log', function () {
        $log = new \Monolog\Logger('slim-bootstrap');
        $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Monolog\Logger::DEBUG));
        return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath($c['config']['path.templates.cache']),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

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
