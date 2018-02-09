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
     * @covers ::normalize
     */
    public function testJoin(Data $data)
    {
        $expected = $data->expected;
        $pieces = $data->pieces;

        $this->assertEquals($expected, Path::join(...$pieces));

        $path = implode('', $pieces);
        $this->assertEquals($expected, Path::normalize($path));

    }

    public function providerJoin()
    {
        return Provider::create()
            ->add([
                'expected' => '/',
                'pieces' => ['/', '///', '////', '////', '///']
            ])
            ->add([
                'expected' => '/path/to/dir/or/file',
                'pieces' => ['/', 'path///', '////to', '////', '', '///dir//or///', 'file']
            ])
            ->add([
                'expected' => '/path',
                'pieces' => ['/', '/path/to///', '..']
            ])
            ->add([
                'expected' => '/',
                'pieces' => ['/', '/path/to///', '../..']
            ])
            ->end();
    }


    /**
     * @test
     * @dataProvider providerJoin
     *
     * @covers ::create
     * @covers ::__construct
     * @covers ::setPath
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
        $this->assertEquals($expected, (string)$path);
    }


    /**
     * @test
     * @dataProvider providerEmpty
     *
     * @covers ::create
     * @covers ::__construct
     * @covers ::setPath
     * @covers \PlanB\Utils\Path\Exception\EmptyPathException::create
     *
     * @expectedException \PlanB\Utils\Path\Exception\EmptyPathException
     * @expectedExceptionMessage No se pueden crear Paths desde cadenas vacias
     */
    public function testEmpty(Data $data)
    {
        $pieces = $data->pieces;

        Path::create(...$pieces);
    }


    public function providerEmpty()
    {
        return Provider::create()
            ->add([
                'pieces' => ['']
            ])
            ->add([
                'pieces' => [' ']
            ])
            ->add([
                'pieces' => ['path/../dir', '..']
            ])
            ->end();
    }


    /**
     * @test
     * @dataProvider providerAppendPrepend
     *
     * @covers ::setPath
     * @covers ::append
     * @covers ::prepend
     */
    public function testAppendPrepend(Data $data)
    {
        $orginal = $data->original;
        $append = $data->append;
        $prepend = $data->prepend;
        $expected = $data->expected;

        $path = Path::create(...$orginal)
            ->append(...$append)
            ->prepend(...$prepend);


        $this->assertEquals($expected, $path->build());
    }

    public function providerAppendPrepend()
    {
        return Provider::create()
            ->add([
                'original' => ['/path/to/dir'],
                'expected' => 'base/path/to/dir/subdir/filename',
                'append' => ['subdir', 'filename'],
                'prepend' => ['base']
            ])
            ->add([
                'original' => ['/path/to/dir'],
                'expected' => 'path/to/dir/subdir/filename',
                'append' => ['subdir', 'filename'],
                'prepend' => ['base', '..']
            ])
            ->add([
                'original' => ['/path/to/dir'],
                'expected' => '/base/path/to',
                'append' => ['..'],
                'prepend' => ['/', 'base' ]
            ])
            ->end();
    }

    /**
     * @test
     * @dataProvider providerAbsolute
     *
     * @covers ::isAbsolute
     * @covers ::isRelative
     */
    public function testAbsolute(Data $data)
    {
        $expected = $data->expected;
        $pieces = $data->pieces;

        $path = Path::create(...$pieces);
        $this->assertInstanceOf(Path::class, $path);

        $this->assertEquals($expected, $path->isAbsolute());
        $this->assertEquals(!$expected, $path->isRelative());
    }

    public function providerAbsolute()
    {
        return Provider::create()
            ->add([
                'expected' => true,
                'pieces' => ['/', '///', '////', '////', '///']
            ])
            ->add([
                'expected' => true,
                'pieces' => ['/', 'path///', '////to', '////', '', '///dir//or///', 'file']
            ])
            ->add([
                'expected' => true,
                'pieces' => ['/', '/path/to///', '..']
            ])
            ->add([
                'expected' => true,
                'pieces' => ['/', '/path/to///', '../..']
            ])
            ->add([
                'expected' => false,
                'pieces' => ['path///', '////to', '////', '', '///dir//or///', 'file']
            ])
            ->add([
                'expected' => false,
                'pieces' => ['path/to///', '..']
            ])
            ->add([
                'expected' => false,
                'pieces' => ['path/to///', 'dir', '../..']
            ])
            ->end();
    }

}