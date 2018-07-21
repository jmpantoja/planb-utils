<?php

namespace spec\PlanB\ValueObject\Path;

use PlanB\ValueObject\Path\Exception\InvalidPathException;
use PlanB\ValueObject\Path\Path;
use PlanB\ValueObject\Path\PathAssurance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PathAssuranceSpec extends ObjectBehavior
{

    public function let(Path $path)
    {
        $this->beConstructedThrough('fromPath', [$path]);
        $path->__toString()->willReturn('/this/is/a/dummy/path');
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

        $this->getPath()->shouldReturn($path);
    }

    public function it_can_ensure_that_path_is_a_directory(Path $path)
    {
        $path->isDirectory()->willReturn(true);
        $this->ensureThatIsADirectory()->shouldReturn($this);
    }

    public function it_can_ensure_that_path_is_not_a_directory(Path $path)
    {
        $path->isDirectory()->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringEnsureThatIsADirectory();
    }

    public function it_can_ensure_that_path_is_a_file(Path $path)
    {
        $path->isFile()->willReturn(true);
        $this->ensureThatIsAFile()->shouldReturn($this);
    }

    public function it_can_ensure_that_path_is_not_a_file(Path $path)
    {
        $path->isFile()->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringEnsureThatIsAFile();
    }

    public function it_can_ensure_that_path_is_a_link(Path $path)
    {
        $path->isLink()->willReturn(true);
        $this->ensureThatIsALink()->shouldReturn($this);
    }

    public function it_can_ensure_that_path_is_not_a_link(Path $path)
    {
        $path->isLink()->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringEnsureThatIsALink();
    }

    public function it_can_ensure_that_path_have_any_extension(Path $path)
    {
        $path->haveExtension()->willReturn(true);
        $this->ensureThatHaveExtension()->shouldReturn($this);
    }

    public function it_can_ensure_that_path_have_one_from_group_of_extensions(Path $path)
    {
        $path->haveExtension('php','txt')->willReturn(true);
        $this->ensureThatHaveExtension('php','txt')->shouldReturn($this);
    }

    public function it_can_ensure_that_path_have_not_any_extension(Path $path)
    {
        $path->haveExtension()->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringEnsureThatHaveExtension();
    }

    public function it_can_ensure_that_path_have_not_expected_extension(Path $path)
    {
        $path->haveExtension('php')->willReturn(false);

        $this->shouldThrow(InvalidPathException::class)->duringEnsureThatHaveExtension('php');
    }

    public function it_can_ensure_that_path_without_extension_have_not_expected_extension(Path $path)
    {
        $path->haveExtension(Argument::any())->willReturn(false);
        $this->shouldThrow(InvalidPathException::class)->duringEnsureThatHaveExtension('php');
    }

}
