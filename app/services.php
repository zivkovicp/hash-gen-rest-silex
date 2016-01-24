<?php

use Silex\Provider\ServiceControllerServiceProvider;
use ZivHashGen\Service\Hash\GeneratorFactory;

$app->register(new ServiceControllerServiceProvider());
$app['zhg.hash_generator_factory'] = function ($app) {
    return new GeneratorFactory($app);
};

