<?php

namespace PlanB\Utils\Path;

use Codeception\Test\Unit;
use PlanB\Utils\Dev\Tdd\Data\Data;
use PlanB\Utils\Dev\Tdd\Data\Provider;
use PlanB\Utils\Dev\Tdd\Feature\Mocker;


/**
 * PathNormalizer Class Test
 * @coversDefaultClass PlanB\Utils\Path\PathNormalizer
 */
class PathNormalizerTest extends Unit
{

    use Mocker;


    /**
     * @var \UnitTester $tester
     */
    protected $tester;

    /**
     * @test
     *
     * @dataProvider providerNormalize
     *
     * @covers ::__construct
     * @covers ::create
     *
     * @covers ::configurePharPrefix
     * @covers ::configureSlashPrefix
     *
     * @covers ::append
     * @covers ::getPartsFromSegment
     * @covers ::isNotEmpty
     * @covers ::add
     * @covers ::overFlowRootDir
     * @covers ::isParentDirectory
     * @covers ::build
     */
    public function testNormalize(Data $data)
    {
        $expected = $data->expected;
        $pieces = $data->pieces;

        /** @var PathNormalizer $target */
        $target = PathNormalizer::create(...$pieces);
        $this->tester->assertInstanceOf(PathNormalizer::class, $target);

        $this->tester->assertEquals($expected, $target->build());
    }


    public function providerNormalize()
    {
        return Provider::create()
            ->add([
                'expected' => 'phar:///path/to/dir/or/file',
                'pieces' => ['phar:///path/to', 'dir/or/file']
            ])
            ->add([
                'expected' => 'phar:///path/to/dir/or/file',
                'pieces' => ['phar://', '/path/to', 'dir/or/file']
            ])
            ->add([
                'expected' => 'phar://path/to/dir/or/file',
                'pieces' => ['phar://', 'path/to//////', 'dir/or/file']
            ])
            ->add([
                'expected' => 'phar://path/to/dir/or/file',
                'pieces' => ['phar://path/to//////', 'dir/or/file']
            ])
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
     *
     * @covers ::__construct
     * @covers ::create
     * @covers ::configurePharPrefix
     * @covers ::configureSlashPrefix
     *
     * @covers ::append
     * @covers ::getPartsFromSegment
     * @covers ::isNotEmpty
     * @covers ::add
     * @covers ::overFlowRootDir
     * @covers ::isParentDirectory
     * @covers ::build
     *
     * @covers \PlanB\Utils\Path\Exception\OverFlowRootDirException::create()
     *
     * @expectedException \PlanB\Utils\Path\Exception\OverFlowRootDirException
     * @expectedExceptionMessage No se puede crear la ruta porque va más allá del directorio raiz
     */
    public function testNormalizeException()
    {
        /** @var PathNormalizer $target */
        PathNormalizer::create('/dos/niveles', '../../../');
    }


}