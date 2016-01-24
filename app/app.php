<?php

use Silex\Application;

$app = new Application();

require CONFIG_PATH . APPLICATION_ENV . '.php';
require APP_PATH . 'controllers.php';
require APP_PATH . 'services.php';

return $app;
