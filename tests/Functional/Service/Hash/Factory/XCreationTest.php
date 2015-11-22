<?php

namespace ZivHashGen\Test\Functional\Service\Hash\Factory;


use Silex\WebTestCase;
use ZivHashGen\Test\Shared\HashGeneratorParamsStub;

class XCreationTest extends WebTestCase
{
    use HashGeneratorParamsStub;

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
     * @expectedExceptionMessage not a valid algorithm
     */
    public function testGeneratorCreation($data)
    {
        $app = $this->createApplication();
        /** @var \ZivHashGen\Service\Hash\GeneratorFactory $factory */
        $factory = $app['zhg.hash_generator_factory'];
        $params  = $this->getParamsStub(
            $data['algorithm'],
            $data['seed'],
            $data['salt']
        );
        $factory->create($params);

        $this->fail('Expecting \InvalidArgumentException exception');
    }

    public function getXData()
    {
        // not base64 because we build stub

        $seed = 'MY_SEED';
        $salt = 'MY_SALT';

        $badAlgorithm = [
            'algorithm' => 'BAD_ALGORITHM',
            'seed'      => $seed,
            'salt'      => $salt
        ];

        return [
            [$badAlgorithm]
        ];
    }
}