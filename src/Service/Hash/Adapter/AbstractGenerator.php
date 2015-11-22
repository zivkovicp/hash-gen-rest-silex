<?php

namespace ZivHashGen\Service\Hash\Adapter;


use ZivHashGen\Service\Hash\Dto\HashGeneratorParams;

abstract class AbstractGenerator
{
    protected $algorithm;

    protected $salt;

    protected $seed;

    public function __construct(HashGeneratorParams $params)
    {
        $this->algorithm = $params->getAlgorithm();
        $this->seed      = $params->getSeed();
        $this->salt      = $params->getSalt();
    }

    /**
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }
}