<?php

// include the prod configuration
require __DIR__.'/prod.php';

//$app['session.test'] = true;
$app['debug'] = true;
unset($app['exception_handler']);
