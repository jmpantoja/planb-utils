<?php

namespace spec\PlanB\Utils\Path;

use PlanB\Utils\Path\Exception\EmptyPathException;
use PlanB\Utils\Path\Exception\OverFlowRootDirException;
use PlanB\Utils\Path\Path;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PathSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->beConstructedThrough('create', ['/tmp']);
        $this->shouldHaveType(Path::class);
    }

    public function it_throws_an_exception_when_initializes_with_empty_string()
    {
        $this->beConstructedThrough('create', []);
        $this->shouldThrow(EmptyPathException::class)->duringInstantiation();
    }

    public function it_can_normalize_a_string()
    {
        $this->beConstructedThrough('normalize', ['/tmp', 'dir']);
        $this->shouldReturn('/tmp/dir');
    }

    public function it_can_append_path_segments()
    {
        $this->beConstructedThrough('create', ['/tmp', 'dir']);
        $this->append('subdir')
            ->build()
            ->shouldReturn('/tmp/dir/subdir');
    }

    public function it_can_prepend_path_segments()
    {
        $this->beConstructedThrough('create', ['/dir', 'subdir']);
        $this->prepend('/', 'tmp')
            ->build()
            ->shouldReturn('/tmp/dir/subdir');
    }


    public function it_can_recognize_an_absolute_path()
    {
        $this->beConstructedThrough('create', ['/tmp', 'dir']);

        $this->isAbsolute()
            ->shouldReturn(true);

        $this->isRelative()
            ->shouldReturn(false);
    }


    public function it_can_recognize_an_relative_path()
    {
        $this->beConstructedThrough('create', ['tmp', 'dir']);

        $this->isRelative()
            ->shouldReturn(true);

        $this->isAbsolute()
            ->shouldReturn(false);

    }

    public function it_can_recognize_if_a_path_exits()
    {
        $this->beConstructedThrough('create', [__DIR__]);

        $this->exists()
            ->shouldReturn(true);
    }

    public function it_can_recognize_if_a_path_is_a_file()
    {
        $this->beConstructedThrough('create', [__FILE__]);

        $this->isFile()
            ->shouldReturn(true);
    }

    public function it_can_recognize_if_a_path_is_not_a_file()
    {
        $this->beConstructedThrough('create', [__DIR__]);

        $this->isFile()
            ->shouldReturn(false);
    }


    public function it_can_recognize_if_a_path_is_a_directory()
    {
        $this->beConstructedThrough('create', [__DIR__]);

        $this->isDirectory()
            ->shouldReturn(true);
    }

    public function it_can_recognize_if_a_path_is_not_a_directory()
    {
        $this->beConstructedThrough('create', [__FILE__]);

        $this->isDirectory()
            ->shouldReturn(false);
    }


    public function it_can_recognize_if_a_path_is_a_link()
    {
        $this->beConstructedThrough('create', [__DIR__, 'dummy/link']);

        $this->isLink()
            ->shouldReturn(true);
    }

    public function it_can_recognize_if_a_path_is_not_a_link()
    {
        $this->beConstructedThrough('create', [__DIR__]);

        $this->isLink()
            ->shouldReturn(false);
    }

    public function it_can_retrive_the_basename()
    {
        $this->beConstructedThrough('create', [__FILE__]);

        $this->getBasename()
            ->shouldReturn('PathSpec.php');
    }

    public function it_can_retrive_the_dirname()
    {
        $this->beConstructedThrough('create', [__FILE__]);

        $this->getDirname()
            ->shouldReturn(__DIR__);
    }

    public function it_can_retrive_the_filename()
    {
        $this->beConstructedThrough('create', [__FILE__]);

        $this->getFilename()
            ->shouldReturn('PathSpec');
    }

    public function it_can_retrive_the_extension()
    {
        $this->beConstructedThrough('create', [__FILE__]);

        $this->getExtension()
            ->shouldReturn('php');
    }

    public function it_can_cast_a_path_to_string()
    {
        $this->beConstructedThrough('create', ['/tmp/anything/../dir/']);

        $this->__toString()
            ->shouldReturn('/tmp/dir');
    }

    public function it_can_access_to_path_parent()
    {
        $this->beConstructedThrough('create', ['/level0/level1/level2/']);

        $this->getParent()
            ->build()
            ->shouldReturn('/level0/level1');
    }

    public function it_can_access_to_path_ancestors()
    {
        $this->beConstructedThrough('create', ['/level0/level1/level2/']);

        $this->getParent(2)
            ->build()
            ->shouldReturn('/level0');


        $this->getParent(3)
            ->build()
            ->shouldReturn('/');
    }

    public function it_throw_an_exception_if_overflow_root_dir()
    {
        $this->beConstructedThrough('create', ['/level0/level1/level2/']);

        $this->shouldThrow(OverFlowRootDirException::class)->duringGetParent(4);

    }
}
