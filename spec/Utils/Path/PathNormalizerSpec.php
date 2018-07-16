<?php

namespace spec\PlanB\Utils\Path;

use PlanB\Utils\Path\Exception\OverFlowRootDirException;
use PlanB\Utils\Path\PathNormalizer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PathNormalizerSpec extends ObjectBehavior
{
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
        $this->beConstructedThrough('newInstance');


        $this->normalize('/tmp/dir/..')->shouldReturn('/tmp');
        $this->normalize('/tmp/dir/dir/../..')->shouldReturn('/tmp');
        $this->normalize('/tmp/dir/../dir/..')->shouldReturn('/tmp');
        $this->normalize('/tmp/../dir/dir/..')->shouldReturn('/dir');

    }

    public function it_build_a_path_from_a_segment_with_simple_dots()
    {
        $this->beConstructedThrough('newInstance');

        $this->normalize('/tmp/.')->shouldReturn('/tmp');
        $this->normalize('/./tmp/.')->shouldReturn('/tmp');
    }

    public function it_build_a_path_from_a_segment_combining_simple_and_double_dots()
    {
        $this->beConstructedThrough('newInstance');

        $this->normalize('/tmp/./..')->shouldReturn('/');

        $this->normalize('/./tmp/./../dir')->shouldReturn('/dir');
    }

    public function it_works_with_relative_paths()
    {
        $this->beConstructedThrough('newInstance');

        $this->normalize('relative/path')->shouldReturn('relative/path');
        $this->normalize('relative/path/..')->shouldReturn('relative');
        $this->normalize('./relative/path/..')->shouldReturn('relative');
        $this->normalize('./relative/./path/..')->shouldReturn('relative');
        $this->normalize('relative/path/../')->shouldReturn('relative');
    }

    public function it_works_with_segments()
    {
        $this->beConstructedThrough('newInstance');

        $this->normalize('relative', 'path')->shouldReturn('relative/path');
        $this->normalize('.', 'relative', 'path')->shouldReturn('relative/path');
        $this->normalize('.', '/relative', 'path')->shouldReturn('relative/path');
        $this->normalize('.', '/relative', '//path')->shouldReturn('relative/path');
        $this->normalize('.///', '/relative', '..', '//path')->shouldReturn('path');
    }

    public function it_keep_absolute_paths()
    {
        $this->beConstructedThrough('newInstance');

        $this->normalize('relative', 'path')->shouldReturn('relative/path');
        $this->normalize('./', 'relative', 'path')->shouldReturn('relative/path');
        $this->normalize('./', 'relative', 'path')->shouldReturn('relative/path');

        $this->normalize('/', 'absolute', 'path')->shouldReturn('/absolute/path');
        $this->normalize('///', 'absolute', 'path')->shouldReturn('/absolute/path');

    }

    public function it_throw_an_exception_if_overflow_root_dir()
    {
        $this->beConstructedThrough('newInstance');

        $this->shouldThrow(OverFlowRootDirException::class)->duringNormalize('/../absolute/path');
        $this->shouldThrow(OverFlowRootDirException::class)->duringNormalize('/', '../', 'absolute/path');
        $this->shouldThrow(OverFlowRootDirException::class)->duringNormalize('../', 'absolute/path');

        $this->shouldThrow(OverFlowRootDirException::class)->duringNormalize('/absolute/path/../../..');

        $this->shouldThrow(OverFlowRootDirException::class)->duringNormalize('relative/path/../../..');

    }
}
