<?php

// include the prod configuration
require __DIR__ . '/production.php';

//$app['session.test'] = true;
$app['debug'] = true;
unset($app['exception_handler']);
