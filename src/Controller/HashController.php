<?php

namespace ZivHashGen\Controller;

use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class HashController implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        /** @var \Silex\ControllerCollection $factory */
        $factory = $app['controllers_factory'];
        $factory->get('/{algorithm}', 'ZivHashGen\Controller\HashController::showAction');

        return $factory;
    }

    public function showAction(Application $app, $algorithm)
    {
        if (!in_array(strtolower($algorithm), $app['zhg.available_algorithms'])) {
            $app->abort(404, "Algorithm {$algorithm} not found.");
        }

        // TODO: allow user params for seed and salt
        /** @var Request $request */
        $request = $app['request_stack']->getCurrentRequest();
        $seed    = (string)$request->get('seed');
        $salt    = (string)$request->get('salt');

        /** @var \ZivHashGen\Service\Hash\GeneratorFactory $factory */
        $factory   = $app['zhg.hash_generator_factory'];
        $params    = $factory->packageParams($algorithm, $seed, $salt);
        $generator = $factory->create($params);

        return new JsonResponse(
            [
                "result"    => $generator->generate(),
                "algorithm" => $generator->getAlgorithm()
            ],
            JsonResponse::HTTP_OK
        );
    }
}