<?php

require_once __DIR__ . '/../vendor/autoload.php';

defined('BASE_PATH') ||
require __DIR__ . '/../config/constants.php';

$app = require APP_PATH . 'app.php';
require CONFIG_PATH . 'test.php';
require APP_PATH . 'controllers.php';
