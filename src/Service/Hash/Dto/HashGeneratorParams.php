<?php

namespace ZivHashGen\Service\Hash\Dto;


class HashGeneratorParams
{
    protected $algorithm;

    protected $salt;

    protected $seed;

    public function __construct($algorithm, $seed = '', $salt = '')
    {
        $this->algorithm = $algorithm;
        $this->seed      = $seed;
        $this->salt      = $salt;
    }

    /**
     * @return mixed
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @return string
     */
    public function getSeed()
    {
        return $this->seed;
    }
}