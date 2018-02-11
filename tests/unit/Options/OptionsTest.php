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
     * @covers ::initialize
     * @covers ::default
     * @covers ::create
     * @covers ::resolve
     *
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     * @expectedExceptionMessage The option "value" with value "X" is invalid.
     * @expectedExceptionMessage Accepted values are: "A", "B", "C".
     */
    public function testDefault()
    {
        $options = DummyOptions::default();

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
     * @covers ::initialize
     * @covers ::custom
     * @covers ::create
     * @covers ::resolve
     *
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     * @expectedExceptionMessage The option "value" with value "A" is invalid.
     * @expectedExceptionMessage Accepted values are: "X", "Y", "Z".
     */
    public function testCustom()
    {
        $options = DummyOptions::custom('CUSTOM');

        $this->assertEquals('CUSTOM', $options->getProfile());
        $options->resolve([
            'value' => 'A'
        ]);
    }

}