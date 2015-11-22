<?php

use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use ZivHashGen\Service\Hash\GeneratorFactory;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());

// Factories
$app['zhg.hash_generator_factory'] = function ($app) {
    return new GeneratorFactory($app);
};


return $app;
