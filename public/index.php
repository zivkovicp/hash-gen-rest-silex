<?php

ini_set('display_errors', 0);

require_once __DIR__.'/../vendor/autoload.php';

require __DIR__ . '/../config/constants.php';

$app = require APP_PATH . 'app.php';
require CONFIG_PATH . 'prod.php';
require APP_PATH . 'controllers.php';
$app->run();
