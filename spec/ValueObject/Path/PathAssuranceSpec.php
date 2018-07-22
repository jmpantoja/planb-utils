<?php

namespace spec\PlanB\ValueObject\Path;

use PlanB\ValueObject\Path\Exception\InvalidPathException;
use PlanB\ValueObject\Path\Path;
use PlanB\ValueObject\Path\PathAssurance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PathAssuranceSpec extends ObjectBehavior
{

    private const  PATH = '/this/is/a/dummy/path';

    public function let(Path $path)
    {
        $this->beConstructedThrough('fromPath', [$path]);
        $path->__toString()->willReturn(self::PATH);
        $path->stringify()->willReturn(self::PATH);
    }

    public function it_is_initializable_from_string()
    {
        $this->beConstructedThrough('fromString', [__DIR__]);
        $this->shouldHaveType(PathAssurance::class);
    }

    public function it_is_initializable_from_path()
    {
        $this->shouldHaveType(PathAssurance::class);
    }

    public function it_can_retrieve_the_path(Path $path)
    {
        $this->end()->shouldReturn($path);
    }

    public function it_can_retrieve_the_path_as_string(Path $path)
    {
        $this->stringify()->shouldReturn(self::PATH);
        $this->__toString()->shouldReturn(self::PATH);
    }

    public function it_can_ensure_that_path_is_a_directory(Path $path)
    {
        $path->isDirectory()->willReturn(true);
        $this->shouldNotThrow(\Throwable::class)->duringIsDirectory();
        $this->isDirectory()->shouldReturn($this);
    }

    public function it_can_ensure_that_path_is_not_a_directory(Path $path)
    {
        $path->isDirectory()->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringIsDirectory();
    }

    public function it_can_ensure_that_path_is_a_file(Path $path)
    {
        $path->isFile()->willReturn(true);
        $this->isFile()->shouldReturn($this);
    }

    public function it_can_ensure_that_path_is_not_a_file(Path $path)
    {
        $path->isFile()->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringIsFile();
    }

    public function it_can_ensure_that_path_is_a_link(Path $path)
    {
        $path->isLink()->willReturn(true);
        $this->isLink()->shouldReturn($this);
    }

    public function it_can_ensure_that_path_is_not_a_link(Path $path)
    {
        $path->isLink()->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringIsLink();
    }

    public function it_can_ensure_that_path_is_readable(Path $path)
    {
        $path->isReadable()->willReturn(true);
        $this->isReadable()->shouldReturn($this);
    }

    public function it_can_ensure_that_path_is_not_readable(Path $path)
    {
        $path->isReadable()->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringIsReadable();
    }


    public function it_can_ensure_that_path_is_writable(Path $path)
    {
        $path->isWritable()->willReturn(true);
        $this->isWritable()->shouldReturn($this);
    }

    public function it_can_ensure_that_path_is_not_writable(Path $path)
    {
        $path->isWritable()->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringIsWritable();
    }


    public function it_can_ensure_that_path_have_any_extension(Path $path)
    {
        $path->hasExtension()->willReturn(true);
        $this->hasExtension()->shouldReturn($this);
    }

    public function it_can_ensure_that_path_have_one_from_group_of_extensions(Path $path)
    {
        $path->hasExtension('php', 'txt')->willReturn(true);
        $this->hasExtension('php', 'txt')->shouldReturn($this);
    }

    public function it_can_ensure_that_path_have_not_any_extension(Path $path)
    {
        $path->hasExtension()->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringHasExtension();
    }

    public function it_can_ensure_that_path_have_not_expected_extension(Path $path)
    {
        $path->hasExtension('php')->willReturn(false);

        $this->shouldThrow(InvalidPathException::class)->duringHasExtension('php');
    }

    public function it_can_ensure_that_path_without_extension_have_not_expected_extension(Path $path)
    {
        $path->hasExtension(Argument::any())->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringHasExtension('php');
    }


    public function it_can_ensure_that_path_is_a_readable_file(Path $path)
    {
        $path->isFile()->willReturn(true);
        $path->isReadable()->willReturn(true);

        $this->isReadableFile()->shouldReturn($this);
    }

    public function it_can_ensure_that_path_is_not_a_readable_file(Path $path)
    {
        $path->isFile()->willReturn(false);
        $path->isReadable()->willReturn(true);

        $this->shouldThrow(InvalidPathException::class)->duringIsReadableFile();
    }


    public function it_can_ensure_that_path_is_a_readable_file_with_extension(Path $path)
    {
        $path->isFile()->willReturn(true);
        $path->isReadable()->willReturn(true);
        $path->hasExtension('php')->willReturn(true);

        $this->isReadableFileWithExtension('php')->shouldReturn($this);
    }

    public function it_can_ensure_that_path_is_not_a_readable_file_with_extension(Path $path)
    {
        $path->isFile()->willReturn(true);
        $path->isReadable()->willReturn(false);
        $path->hasExtension('php')->willReturn(true);

        $this->shouldThrow(InvalidPathException::class)->duringIsReadableFileWithExtension('php');
    }
}
