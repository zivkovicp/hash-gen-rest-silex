<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

$app->get('/', function () use ($app) {
    return new JsonResponse(
        [
            "foo" => "bar"
        ],
        JsonResponse::HTTP_OK
    );
});


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
