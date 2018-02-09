<?php

namespace PlanB\Utils\Path;

use PlanB\Utils\Dev\Tdd\Test\Data\Data;
use PlanB\Utils\Dev\Tdd\Test\Data\Provider;
use PlanB\Utils\Dev\Tdd\Test\Unit;


/**
 * PathTree Class Test
 * @coversDefaultClass PlanB\Utils\Path\PathTree
 */
class PathTreeTest extends Unit
{
    /**
     * @test
     *
     * @covers ::__construct
     * @covers ::create
     *
     * @covers ::getTree
     * @covers ::getInversedTree
     */
    public function testTreeAbsolutePath()
    {

        $path = PathTree::create('/path/to/dirname');

        $this->assertContainsOnly('string', $path->getTree());
        $this->assertEquals([
            '/',
            '/path',
            '/path/to',
            '/path/to/dirname'
        ], $path->getTree());


        $this->assertContainsOnly('string', $path->getInversedTree());
        $this->assertEquals([
            '/path/to/dirname',
            '/path/to',
            '/path',
            '/'
        ], $path->getInversedTree());

    }

    /**
     * @test
     *
     * @covers ::__construct
     * @covers ::create
     *
     * @covers ::getTree
     * @covers ::getInversedTree
     */
    public function testTreeRelativePath()
    {

        $path = PathTree::create('path/to/dirname');

        $this->assertContainsOnly('string', $path->getTree());
        $this->assertEquals([
            'path',
            'path/to',
            'path/to/dirname'
        ], $path->getTree());


        $this->assertContainsOnly('string', $path->getInversedTree());
        $this->assertEquals([
            'path/to/dirname',
            'path/to',
            'path',
        ], $path->getInversedTree());

    }


    /**
     * @test
     * @dataProvider providerEmpty
     *
     * @covers ::__construct
     * @covers ::create
     *
     * @covers       \PlanB\Utils\Path\Exception\EmptyPathException::create
     *
     * @expectedException \PlanB\Utils\Path\Exception\EmptyPathException
     * @expectedExceptionMessage No se pueden crear Paths desde cadenas vacias
     */
    public function testTreeEmpty(Data $data)
    {
        $pieces = $data->pieces;

        PathTree::create(...$pieces);
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
     *
     * @covers ::__construct
     * @covers ::create
     *
     * @covers ::getPathTree
     * @covers ::getInversedPathTree
     */
    public function testPathTreeAbsolutePath()
    {

        $path = PathTree::create('/path/to/dirname');

        $this->assertContainsOnly(Path::class, $path->getPathTree());
        $this->assertEquals([
            '/',
            '/path',
            '/path/to',
            '/path/to/dirname'
        ], $path->getPathTree());


        $this->assertContainsOnly(Path::class, $path->getInversedPathTree());
        $this->assertEquals([
            '/path/to/dirname',
            '/path/to',
            '/path',
            '/'
        ], $path->getInversedPathTree());

    }


    /**
     * @test
     *
     * @covers ::__construct
     * @covers ::create
     *
     * @covers ::getPathTree
     * @covers ::getInversedPathTree
     */
    public function testPathTreeRelativePath()
    {

        $path = PathTree::create('path/to/dirname');

        $this->assertContainsOnly(Path::class, $path->getPathTree());
        $this->assertEquals([
            'path',
            'path/to',
            'path/to/dirname'
        ], $path->getPathTree());


        $this->assertContainsOnly(Path::class, $path->getInversedPathTree());
        $this->assertEquals([
            'path/to/dirname',
            'path/to',
            'path'
        ], $path->getInversedPathTree());

    }
}