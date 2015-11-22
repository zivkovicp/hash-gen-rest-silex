<?php

namespace ZivHashGen\Test\Functional\Service\Hash\Factory;


use Silex\WebTestCase;

class PackageParamsTest extends WebTestCase
{
    public function createApplication()
    {
        $app = require APP_PATH . 'app.php';
        require CONFIG_PATH . 'test.php';

        return $app;
    }

    /**
     * @param array $data
     * @dataProvider getData
     */
    public function testPackageParams($data)
    {
        $app = $this->createApplication();
        /** @var \ZivHashGen\Service\Hash\GeneratorFactory $factory */
        $factory = $app['zhg.hash_generator_factory'];
        $params  = $factory->packageParams(
            $data['algorithm'],
            $data['seed'],
            $data['salt']
        );

        $this->assertInstanceOf(
            '\ZivHashGen\Service\Hash\Dto\HashGeneratorParams',
            $params
        );
    }

    public function getData()
    {
        // base64 because we use factory

        $seed = base64_encode('MY_SEED');
        $salt = base64_encode('MY_SALT');

        $md5 = [
            'algorithm' => 'md5',
            'seed'      => $seed,
            'salt'      => $salt,
        ];

        return [
            [$md5]
        ];
    }
}