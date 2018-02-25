<?php

namespace PlanB\Utils\Path;

use Codeception\Test\Unit;
use PlanB\Utils\Dev\Tdd\Data\Data;
use PlanB\Utils\Dev\Tdd\Data\Provider;
use PlanB\Utils\Dev\Tdd\Feature\Mocker;


/**
 * PathTree Class Test
 * @coversDefaultClass PlanB\Utils\Path\PathTree
 */
class PathTreeTest extends Unit
{

    use Mocker;


    /**
     * @var \UnitTester $tester
     */
    protected $tester;


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
        $this->tester->assertEquals([
            '/',
            '/path',
            '/path/to',
            '/path/to/dirname'
        ], $path->getTree());


        $this->assertContainsOnly('string', $path->getInversedTree());
        $this->tester->assertEquals([
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
        $this->tester->assertEquals([
            'path',
            'path/to',
            'path/to/dirname'
        ], $path->getTree());


        $this->assertContainsOnly('string', $path->getInversedTree());
        $this->tester->assertEquals([
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
        $this->tester->assertEquals([
            '/',
            '/path',
            '/path/to',
            '/path/to/dirname'
        ], $path->getPathTree());


        $this->assertContainsOnly(Path::class, $path->getInversedPathTree());
        $this->tester->assertEquals([
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
        $this->tester->assertEquals([
            'path',
            'path/to',
            'path/to/dirname'
        ], $path->getPathTree());


        $this->assertContainsOnly(Path::class, $path->getInversedPathTree());
        $this->tester->assertEquals([
            'path/to/dirname',
            'path/to',
            'path'
        ], $path->getInversedPathTree());

    }
}