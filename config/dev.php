<?php

use Silex\Provider\MonologServiceProvider;

// include the prod configuration
require __DIR__.'/prod.php';

// enable debug mode
$app['debug'] = true;

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => LOG_PATH . 'silex_dev.log',
));
