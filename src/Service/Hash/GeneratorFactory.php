<?php

namespace ZivHashGen\Service\Hash;


use Silex\Application;
use ZivHashGen\Service\Hash\Adapter\Md5Generator;
use ZivHashGen\Service\Hash\Dto\HashGeneratorParams;

class GeneratorFactory extends AbstractFactory
{
    const MD5 = 'md5';

    /** @var  Application $app */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Make HashGeneratorParams DTO
     *
     * @param string $algorithm
     * @param string $seed
     * @param string $salt
     * @return HashGeneratorParams
     */
    public function packageParams($algorithm, $seed, $salt)
    {
        if (!in_array($algorithm, $this->app['zhg.available_algorithms'])
            || !$seed = base64_decode($seed, true)
            || !$salt = base64_decode($salt, true)
        ) {
            throw new \InvalidArgumentException("Invalid arguments");
        }

        $seed = filter_var($seed, FILTER_SANITIZE_STRING);
        $salt = filter_var($salt, FILTER_SANITIZE_STRING);

        return new HashGeneratorParams($algorithm, $seed, $salt);
    }

    /**
     * {@inheritdoc}
     */
    protected function createGenerator(HashGeneratorParams $params)
    {
        switch ($params->getAlgorithm()) {
            case self::MD5:
                return new Md5Generator($params);
                break;
            default:
                throw new \InvalidArgumentException(
                    $params->getAlgorithm() . " is not a valid algorithm"
                );
        }
    }
}