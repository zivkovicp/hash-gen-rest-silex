<?php

namespace ZivHashGen\Service\Hash\Adapter;


interface GeneratorInterface
{
    /** @return string */
    public function generate();

    /** @return string */
    public function getAlgorithm();
}