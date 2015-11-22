<?php

namespace ZivHashGen\Service\Hash\Adapter;


class Md5Generator extends AbstractGenerator implements GeneratorInterface
{
    /**
     * Returns a MD5 hash
     *
     * @return string
     */
    public function generate()
    {
        return md5($this->salt . $this->seed);
    }
}