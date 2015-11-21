<?php

namespace ZivHashGen\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class HashController
{
    public function showAction($algorithm)
    {
        return new JsonResponse(
            [
                "result"    => "3858f62230ac3c915f300c664312c63f",
                "algorithm" => "md5"
            ],
            JsonResponse::HTTP_OK
        );
    }
}