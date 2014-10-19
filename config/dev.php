<?php

use Silex\Provider\MonologServiceProvider;

// include the prod configuration
require __DIR__ . '/prod.php';

// enable the debug mode
$app['debug'] = true;

$app->register(new MonologServiceProvider(), [
    'monolog.logfile' => __DIR__ . '/../var/logs/silex_dev.log',
]);
