<?php

namespace spec\PlanB\Type\Path;

use PlanB\Type\Path\Exception\OverFlowRootDirException;
use PlanB\Type\Path\PathNormalizer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PathNormalizerSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {

        $this->shouldHaveType(PathNormalizer::class);
    }

    public function it_build_a_path_from_a_simple_segment()
    {
        $pieces = ['/tmp'];

        $this->beConstructedThrough('normalize', $pieces);
        $this->shouldReturn('/tmp');
    }

    public function it_build_a_path_from_a_segment_with_double_dots()
    {
        $this->normalize('/tmp/dir/..')->shouldReturn('/tmp');
        $this->normalize('/tmp/dir/dir/../..')->shouldReturn('/tmp');
        $this->normalize('/tmp/dir/../dir/..')->shouldReturn('/tmp');
        $this->normalize('/tmp/../dir/dir/..')->shouldReturn('/dir');

    }

    public function it_build_a_path_from_a_segment_with_simple_dots()
    {
        $this->normalize('/tmp/.')->shouldReturn('/tmp');
        $this->normalize('/./tmp/.')->shouldReturn('/tmp');
    }

    public function it_build_a_path_from_a_segment_combining_simple_and_double_dots()
    {
        $this->normalize('/tmp/./..')->shouldReturn('/');
        $this->normalize('/./tmp/./../dir')->shouldReturn('/dir');
    }

    public function it_works_with_relative_paths()
    {
        $this->normalize('relative/path')->shouldReturn('relative/path');
        $this->normalize('relative/path/..')->shouldReturn('relative');
        $this->normalize('./relative/path/..')->shouldReturn('relative');
        $this->normalize('./relative/./path/..')->shouldReturn('relative');
        $this->normalize('relative/path/../')->shouldReturn('relative');
    }

    public function it_works_with_segments()
    {
        $this->normalize('relative', 'path')->shouldReturn('relative/path');
        $this->normalize('.', 'relative', 'path')->shouldReturn('relative/path');
        $this->normalize('.', '/relative', 'path')->shouldReturn('relative/path');
        $this->normalize('.', '/relative', '//path')->shouldReturn('relative/path');
        $this->normalize('.///', '/relative', '..', '//path')->shouldReturn('path');
    }

    public function it_keep_absolute_paths()
    {
        $this->normalize('relative', 'path')->shouldReturn('relative/path');
        $this->normalize('./', 'relative', 'path')->shouldReturn('relative/path');
        $this->normalize('./', 'relative', 'path')->shouldReturn('relative/path');

        $this->normalize('/', 'absolute', 'path')->shouldReturn('/absolute/path');
        $this->normalize('///', 'absolute', 'path')->shouldReturn('/absolute/path');

    }

    public function it_throw_an_exception_if_overflow_root_dir()
    {
        $this->shouldThrow(OverFlowRootDirException::class)->duringNormalize('/../absolute/path');
        $this->shouldThrow(OverFlowRootDirException::class)->duringNormalize('/', '../', 'absolute/path');
        $this->shouldThrow(OverFlowRootDirException::class)->duringNormalize('../', 'absolute/path');

        $this->shouldThrow(OverFlowRootDirException::class)->duringNormalize('/absolute/path/../../..');
        $this->shouldThrow(OverFlowRootDirException::class)->duringNormalize('relative/path/../../..');

    }
}
