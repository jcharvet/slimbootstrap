<?php

error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
date_default_timezone_set('Europe/London');

$loader = require dirname(__DIR__) . '/vendor/autoload.php';

define('SLIM_MODE', 'testing');

function d($var) {
    var_dump($var);
}

function dd($var) {
    d($var);
    die();
}
