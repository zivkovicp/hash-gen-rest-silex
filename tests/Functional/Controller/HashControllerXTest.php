<?php

namespace ZivHashGenTest\Functional\Controller;

use Silex\WebTestCase;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class HashControllerXTest extends WebTestCase
{
    public function createApplication()
    {
        $app = require APP_PATH . 'app.php';
        require CONFIG_PATH . 'test.php';
        require APP_PATH . 'controllers.php';

        return $app;
    }

    public function testHashNotFound()
    {
        $this->setExpectedException(
            'Symfony\Component\HttpKernel\Exception\HttpException',
            'Algorithm foobar not found'
        );

        $client = $this->createClient();
        $client->request('GET', '/api/v1/hash/foobar');

        $client->getResponse();

        $this->fail("Should have thrown exception");
    }
}