<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use ZivHashGen\Controller;

$app->mount('/api/v1/hash', new Controller\HashController());

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
