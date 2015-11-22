<?php

namespace ZivHashGen\Test\Shared;


trait HashGeneratorParamsStub
{
    /**
     * Stub HashGeneratorParams Dto
     *
     * @param string $algorithm
     * @param string $seed
     * @param string $salt
     * @return \ZivHashGen\Service\Hash\Dto\HashGeneratorParams
     */
    public function getParamsStub($algorithm, $seed = '', $salt = '')
    {
        $params = $this->getMockBuilder('\ZivHashGen\Service\Hash\Dto\HashGeneratorParams')
                       ->disableOriginalConstructor()
                       ->getMock();

        // Configure the stub.
        $params->method('getAlgorithm')
               ->willReturn($algorithm);
        $params->method('getSeed')
               ->willReturn($seed);
        $params->method('getSalt')
               ->willReturn($salt);

        return $params;
    }
}