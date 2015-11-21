<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use ZivHashGen\Controller;

$app['hash.controller'] = function () use ($app) {
    return new Controller\HashController();
};
$app->get('/api/v1/hash/{algorithm}', "hash.controller:showAction");


$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $message = $e->getMessage();
    if (substr($code, 0, 1) == 5) {
        $message = "Internal server error.";
    }

    return new JsonResponse(
        [
            "error" => $message,
            "code"  => $code
        ],
        $code
    );
});
