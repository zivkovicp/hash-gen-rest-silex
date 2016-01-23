<?php

namespace ZivHashGenTest\Functional\Controller;

use Silex\WebTestCase;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class HashControllerParamsTest extends WebTestCase
{
    public function createApplication()
    {
        $app = require APP_PATH . 'app.php';
        require CONFIG_PATH . 'test.php';
        require APP_PATH . 'controllers.php';

        return $app;
    }

    public function testGetHash()
    {
        $params = [
            'seed' => base64_encode('foo'),
            'salt' => base64_encode('baz')
        ];
        $client = $this->createClient();
        $client->request('GET', '/api/v1/hash/md5', $params);

        // TODO: actually assert something useful
        $this->assertTrue($client->getResponse()->isOk());
    }
}