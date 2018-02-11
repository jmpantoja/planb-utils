<?php

namespace PlanB\Utils\Options;

use PlanB\Utils\Dev\Tdd\Test\Unit;
use Symfony\Component\OptionsResolver\OptionsResolver;


/**
 * Options Class Test
 *
 * @coversDefaultClass \PlanB\Utils\Options\Options
 */
class OptionsTest extends Unit
{

    /**
     * @test
     *
     * @covers ::__construct
     * @covers ::getProfile
     * @covers ::create
     * @covers ::configure
     * @covers ::newInstance
     * @covers ::resolve
     * @covers ::getResolver
     *
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     * @expectedExceptionMessage The option "value" with value "X" is invalid.
     * @expectedExceptionMessage Accepted values are: "A", "B", "C".
     */
    public function testCreate()
    {
        $options = DummyOptions::create();

        $this->assertEquals('standard', $options->getProfile());
        $options->resolve([
            'value' => 'X'
        ]);
    }

    /**
     * @test
     *
     * @covers ::__construct
     * @covers ::getProfile
     * @covers ::create
     * @covers ::configure
     * @covers ::newInstance
     * @covers ::resolve
     * @covers ::getResolver
     *
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     * @expectedExceptionMessage The option "value" with value "A" is invalid.
     * @expectedExceptionMessage Accepted values are: "X", "Y", "Z".
     */
    public function testCustom()
    {
        $options = DummyOptions::create('CUSTOM');

        $this->assertEquals('CUSTOM', $options->getProfile());
        $options->resolve([
            'value' => 'A'
        ]);
    }

    /**
     * @test
     * @covers ::map
     *
     */
    public function testMap()
    {
        $options = DummyOptions::create('CUSTOM');

        $values = [
            ['value' => 'X'],
            ['value' => 'Y'],
            ['value' => 'Z']
        ];

        $this->assertEquals('CUSTOM', $options->getProfile());
        $params = $options->map($values);

        $this->assertEquals($values, $params);
    }
}