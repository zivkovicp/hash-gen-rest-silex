<?php

namespace ZivHashGen\Service\Hash;


use ZivHashGen\Service\Hash\Dto\HashGeneratorParams;

abstract class AbstractFactory
{
    /**
     * Children must implement this method
     *
     * @param HashGeneratorParams $params
     * @return \ZivHashGen\Service\Hash\Adapter\GeneratorInterface
     */
    abstract protected function createGenerator(HashGeneratorParams $params);

    /**
     * Creates a hash generator
     *
     * @param HashGeneratorParams $params
     * @return \ZivHashGen\Service\Hash\Adapter\GeneratorInterface
     */
    public function create(HashGeneratorParams $params)
    {
        $generator = $this->createGenerator($params);
        return $generator;
    }
}
