<?php

namespace ZivHashGen\Test\Functional\Service\Hash\Factory;


use Silex\WebTestCase;
use ZivHashGen\Test\Shared\HashGeneratorParamsStub;

class CreationTest extends WebTestCase
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
     * @dataProvider getData
     */
    public function testGeneratorCreation($data)
    {
        $app = $this->createApplication();
        /** @var \ZivHashGen\Service\Hash\GeneratorFactory $factory */
        $factory   = $app['zhg.hash_generator_factory'];
        $params    = $this->getParamsStub(
            $data['algorithm'],
            $data['seed'],
            $data['salt']
        );
        $generator = $factory->create($params);

        $this->assertInstanceOf('\ZivHashGen\Service\Hash\Adapter\GeneratorInterface', $generator);
    }

    public function getData()
    {
        // not base64 because we build stub

        $seed = 'MY_SEED';
        $salt = 'MY_SALT';

        $md5 = [
            'algorithm' => 'md5',
            'seed'      => $seed,
            'salt'      => $salt,
            'expected'  => md5($salt . $seed)
        ];

        return [
            [$md5]
        ];
    }
}