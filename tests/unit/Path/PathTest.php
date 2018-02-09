<?php

namespace PlanB\Utils\Path;

use PlanB\Utils\Dev\Tdd\Test\Data\Data;
use PlanB\Utils\Dev\Tdd\Test\Data\Provider;
use PlanB\Utils\Dev\Tdd\Test\Unit;


/**
 * Path Class Test
 * @coversDefaultClass PlanB\Utils\Path\Path
 */
class PathTest extends Unit
{

    /**
     * @test
     * @dataProvider providerJoin
     *
     * @covers ::join
     */
    public function testJoin(Data $data)
    {
        $expected = $data->expected;
        $pieces = $data->pieces;

        $response = Path::join(...$pieces);
        $this->assertEquals($expected, $response);

    }

    public function providerJoin()
    {
        return Provider::create()
            ->add([
                'expected' => '/',
                'pieces'=> ['/', '///', '////', '////', '///']
            ])
            ->add([
                'expected' =>'/path/to/dir/or/file',
                'pieces'=> ['/', 'path///', '////to', '////', '', '///dir//or///', 'file']
            ])
            ->add([
                'expected' =>'/path',
                'pieces'=> ['/', '/path/to///', '..']
            ])
            ->add([
                'expected' =>'/',
                'pieces'=> ['/', '/path/to///', '../..']
            ])
            ->end();
    }


    /**
     * @test
     * @dataProvider providerJoin
     *
     * @covers ::create
     * @covers ::__construct
     * @covers ::build
     * @covers ::__toString
     */
    public function testCreate(Data $data)
    {
        $expected = $data->expected;
        $pieces = $data->pieces;

        $path = Path::create(...$pieces);
        $this->assertInstanceOf(Path::class, $path);

        $this->assertEquals($expected, $path->build());
        $this->assertEquals($expected, (string) $path);

    }

}