<?php

ini_set('display_errors', 0);

require_once __DIR__.'/../vendor/autoload.php';
require __DIR__ . '/../config/constants.php';

$app = require APP_PATH . 'app.php';
$app->run();
