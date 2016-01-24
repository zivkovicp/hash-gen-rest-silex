<?php

namespace ZivHashGenTest\Functional\Controller;

use Silex\WebTestCase;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class HashControllerTest extends WebTestCase
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
        $client = $this->createClient();
        $client->request('GET', '/api/v1/hash/md5');

        $response = $client->getResponse();

        $expected = ["result"    => "d41d8cd98f00b204e9800998ecf8427e",
                     "algorithm" => "md5"];
        $actual   = json_decode($response->getContent(), true);

        $this->assertTrue($response->isOk());
        $this->assertSame($expected, $actual);
    }
}