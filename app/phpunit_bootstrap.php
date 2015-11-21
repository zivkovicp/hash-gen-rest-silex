<?php

require_once __DIR__ . '/../vendor/autoload.php';

defined('APP_PATH') ||
require __DIR__ . '/../config/constants.php';

$app = require APP_PATH . 'app.php';
require CONFIG_PATH . 'dev.php';
require APP_PATH . 'controllers.php';

//$app['session.test'] = true;
$app['debug'] = true;
unset($app['exception_handler']);