<?php

namespace ZivHashGen\Test\Functional\Service\Hash\Factory;


use Silex\WebTestCase;

class XPackageParamsTest extends WebTestCase
{
    public function createApplication()
    {
        $app = require APP_PATH . 'app.php';
        require CONFIG_PATH . 'test.php';

        return $app;
    }

    /**
     * @param array $data
     * @dataProvider             getXData
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid arguments
     */
    public function testPackageParams($data)
    {
        $app = $this->createApplication();
        /** @var \ZivHashGen\Service\Hash\GeneratorFactory $factory */
        $factory = $app['zhg.hash_generator_factory'];
        $factory->packageParams(
            $data['algorithm'],
            $data['seed'],
            $data['salt']
        );

        $this->fail('Expecting \InvalidArgumentException exception');
    }

    public function getXData()
    {
        // base64 because we use factory

        $badAlgorithm = [
            'algorithm' => 'BAD_ALGORITHM',
            'seed'      => base64_encode('GOOD_SEED'),
            'salt'      => base64_encode('GOOD_SALT')
        ];
        $badSeed      = [
            'algorithm' => 'md5',
            'seed'      => 'BAD_SEED',
            'salt'      => base64_encode('GOOD_SALT')
        ];
        $badSalt      = [
            'algorithm' => 'md5',
            'seed'      => base64_encode('GOOD_SEED'),
            'salt'      => 'BAD_SALT'
        ];

        return [
            [$badAlgorithm],
            [$badSeed],
            [$badSalt]
        ];
    }
}