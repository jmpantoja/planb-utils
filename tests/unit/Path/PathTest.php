<?php

namespace PlanB\Utils\Path;

use Codeception\Test\Unit;
use PlanB\Utils\Dev\Tdd\Feature\Mocker;
use PlanB\Utils\Dev\Tdd\Data\Data;
use PlanB\Utils\Dev\Tdd\Data\Provider;


/**
 * Path Class Test
 * @coversDefaultClass PlanB\Utils\Path\Path
 */
class PathTest extends Unit
{

    use Mocker;


    /**
     * @var \UnitTester $tester
     */
    protected $tester;

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

        $this->tester->assertEquals($expected, Path::join(...$pieces));

        $path = implode('', $pieces);
        $this->tester->assertEquals($expected, Path::normalize($path));

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
        $this->tester->assertInstanceOf(Path::class, $path);

        $this->tester->assertEquals($expected, $path->build());
        $this->tester->assertEquals($expected, (string)$path);
    }


    /**
     * @test
     *
     * @dataProvider providerGlob
     *
     * @covers ::glob
     */
    public function testGlob(Data $data)
    {

        $result = Path::glob(__DIR__, 'dummy/glob', $data->pattern);

        $paths = array_map(function (Path $path) {
            return $path->build();
        }, $result);

        $this->assertEquals($data->expected, $paths);

    }


    public function providerGlob()
    {
        return Provider::create()
            ->add([
                'pattern' => '*.txt',
                'expected' => [
                    sprintf('%s/dummy/glob/A.txt', __DIR__),
                    sprintf('%s/dummy/glob/B.txt', __DIR__),
                    sprintf('%s/dummy/glob/C.txt', __DIR__)
                ]
            ])
            ->add([
                'pattern' => '*.yml',
                'expected' => [
                    sprintf('%s/dummy/glob/A.yml', __DIR__),
                    sprintf('%s/dummy/glob/B.yml', __DIR__),
                    sprintf('%s/dummy/glob/C.yml', __DIR__)
                ]
            ])
            ->add([
                'pattern' => 'A.*',
                'expected' => [
                    sprintf('%s/dummy/glob/A.txt', __DIR__),
                    sprintf('%s/dummy/glob/A.yml', __DIR__)
                ]
            ])
            ->add([
                'pattern' => 'B.*',
                'expected' => [
                    sprintf('%s/dummy/glob/B.txt', __DIR__),
                    sprintf('%s/dummy/glob/B.yml', __DIR__)
                ]
            ])
            ->add([
                'pattern' => 'C.*',
                'expected' => [
                    sprintf('%s/dummy/glob/C.txt', __DIR__),
                    sprintf('%s/dummy/glob/C.yml', __DIR__)
                ]
            ])
            ->end();

    }

    /**
     * @test
     * @dataProvider providerEmpty
     *
     * @covers ::create
     * @covers ::__construct
     * @covers ::setPath
     * @covers       \PlanB\Utils\Path\Exception\EmptyPathException::create
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


        $this->tester->assertEquals($expected, $path->build());
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
                'prepend' => ['/', 'base']
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
        $this->tester->assertInstanceOf(Path::class, $path);

        $this->tester->assertEquals($expected, $path->isAbsolute());
        $this->tester->assertEquals(!$expected, $path->isRelative());
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


    /**
     * @test
     * @dataProvider providerParent
     *
     * @covers ::parent
     */
    public function testParent(Data $data)
    {
        $expected = $data->expected;
        $level = $data->level;

        $path = Path::create('/path/to/dirname/subdirA/subdirB/filename');

        $this->tester->assertEquals($expected, $path->parent($level));
    }

    public function providerParent()
    {
        return Provider::create()
            ->add([
                'level' => 0,
                'expected' => '/path/to/dirname/subdirA/subdirB/filename'
            ])
            ->add([
                'level' => 1,
                'expected' => '/path/to/dirname/subdirA/subdirB'
            ])
            ->add([
                'level' => 2,
                'expected' => '/path/to/dirname/subdirA'
            ])
            ->add([
                'level' => 3,
                'expected' => '/path/to/dirname'
            ])
            ->add([
                'level' => 4,
                'expected' => '/path/to'
            ])
            ->add([
                'level' => 5,
                'expected' => '/path'
            ])
            ->add([
                'level' => 6,
                'expected' => '/'
            ])
            ->end();
    }

    /**
     * @test
     *
     * @covers ::parent
     * @covers \PlanB\Utils\Path\Exception\OverFlowRootDirException::create
     *
     * @expectedException \PlanB\Utils\Path\Exception\OverFlowRootDirException
     * @expectedExceptionMessage No se puede crear la ruta porque va más allá del directorio raiz
     */
    public function testParentOverflow()
    {
        $path = Path::create('/path/to/dirname/subdirA/subdirB/filename');

        $path->parent(7);
    }

    /**
     * @test
     *
     * @covers ::basename
     * @covers ::filename
     * @covers ::extension
     *
     */
    public function testInfo()
    {

        $path = Path::create('/path/to/dirname/subdirA/subdirB/filename.ext');

        $this->tester->assertEquals('filename.ext', $path->basename());
        $this->tester->assertEquals('filename', $path->filename());
        $this->tester->assertEquals('ext', $path->extension());

        $path = Path::create('/path/to/dirname/subdirA/subdirB/filename');

        $this->tester->assertEquals('filename', $path->basename());
        $this->tester->assertEquals('filename', $path->filename());
        $this->tester->assertNull($path->extension());

    }


    /**
     * @test
     * @dataProvider providerType
     *
     * @covers ::exists
     * @covers ::isFile
     * @covers ::isDirectory
     * @covers ::isLink
     *
     */
    public function testType(Data $data)
    {
        $path = $data->path;
        $exists = $data->exists;
        $file = $data->file;
        $directory = $data->directory;
        $link = $data->link;


        $path = Path::create($path);

        $this->tester->assertEquals($exists, $path->exists());
        $this->tester->assertEquals($file, $path->isFile());
        $this->tester->assertEquals($directory, $path->isDirectory());
        $this->tester->assertEquals($link, $path->isLink());

    }

    public function providerType()
    {
        return Provider::create()
            ->add([
                'path' => __FILE__,
                'exists' => true,
                'file' => true,
                'directory' => false,
                'link' => false
            ])
            ->add([
                'path' => __DIR__,
                'exists' => true,
                'file' => false,
                'directory' => true,
                'link' => false
            ])
            ->add([
                'path' => __DIR__ . '/fake-file.ext',
                'exists' => false,
                'file' => false,
                'directory' => false,
                'link' => false
            ])
            ->end();

    }

}