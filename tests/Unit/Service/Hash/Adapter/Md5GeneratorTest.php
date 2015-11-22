<?php

namespace ZivHashGen\Test\Unit\Service\Hash\Adapter;


use ZivHashGen\Service\Hash\Adapter\Md5Generator;
use ZivHashGen\Test\Shared\HashGeneratorParamsStub;

class Md5GeneratorTest extends \PHPUnit_Framework_TestCase
{
    use HashGeneratorParamsStub;
    
    /**
     * @param array $data
     * @dataProvider getData
     */
    public function testGetAlgorithm($data)
    {
        $params = $this->getParamsStub(
            $data['algorithm'],
            $data['seed'],
            $data['salt']
        );

        $expected  = $data['algorithm'];
        $generator = new Md5Generator($params);
        $result    = $generator->getAlgorithm();

        $this->assertEquals($expected, $result);
    }

    /**
     * @param array $data
     * @dataProvider getData
     */
    public function testGenerate($data)
    {
        $params = $this->getParamsStub(
            $data['algorithm'],
            $data['seed'],
            $data['salt']
        );

        $expected  = $data['expected'];
        $generator = new Md5Generator($params);
        $result    = $generator->generate();

        $this->assertEquals($expected, $result);
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

        $md5Empty = [
            'algorithm' => 'md5',
            'seed'      => '',
            'salt'      => '',
            'expected'  => md5('')
        ];

        return [
            [$md5],
            [$md5Empty]
        ];
    }
}