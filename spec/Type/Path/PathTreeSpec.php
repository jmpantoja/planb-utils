<?php

namespace spec\PlanB\Type\Path;

use PlanB\Type\Path\Path;
use PlanB\Type\Path\PathTree;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PathTreeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->beConstructedThrough('make', [__DIR__]);
        $this->shouldHaveType(PathTree::class);
    }

    public function getMatchers(): array
    {
        return [
            'havePaths' => function ($response, $expected) {
                $paths = array_map(function ($path) {
                    return $path->stringify();
                }, $response);

                return $paths === $expected;
            }
        ];
    }

    public function it_can_build_the_path_tree_from_a_absolute_path()
    {
        $this->beConstructedThrough('make', ['/level0/level1/level2']);

        $this->getPathTree()
            ->shouldHavePaths([
                '/',
                '/level0',
                '/level0/level1',
                '/level0/level1/level2'
            ]);
    }

    public function it_can_build_the_inverse_path_tree_from_a_absolute_path()
    {
        $this->beConstructedThrough('make', ['/level0/level1/level2']);

        $this->getInversedPathTree()
            ->shouldHavePaths([
                '/level0/level1/level2',
                '/level0/level1',
                '/level0',
                '/',
            ]);
    }

    public function it_can_build_the_tree_from_a_absolute_path()
    {
        $this->beConstructedThrough('make', ['/level0/level1/level2']);

        $this->getTree()
            ->shouldReturn([
                '/',
                '/level0',
                '/level0/level1',
                '/level0/level1/level2'
            ]);
    }

    public function it_can_build_the_inverse_tree_from_a_absolute_path()
    {
        $this->beConstructedThrough('make', ['/level0/level1/level2']);

        $this->getInversedTree()
            ->shouldReturn([
                '/level0/level1/level2',
                '/level0/level1',
                '/level0',
                '/'
            ]);
    }


    public function it_can_build_the_path_tree_from_a_relative_path()
    {
        $this->beConstructedThrough('make', ['level0/level1/level2']);

        $this->getPathTree()
            ->shouldHavePaths([
                'level0',
                'level0/level1',
                'level0/level1/level2'
            ]);
    }

    public function it_can_build_the_inversed_path_tree_from_a_relative_path()
    {
        $this->beConstructedThrough('make', ['level0/level1/level2']);

        $this->getInversedPathTree()
            ->shouldHavePaths([
                'level0/level1/level2',
                'level0/level1',
                'level0',
            ]);
    }

    public function it_can_build_the_tree_from_a_relative_path()
    {
        $this->beConstructedThrough('make', ['level0/level1/level2']);

        $this->getTree()
            ->shouldReturn([
                'level0',
                'level0/level1',
                'level0/level1/level2'
            ]);
    }

    public function it_can_build_the_inversed_tree_from_a_relative_path()
    {
        $this->beConstructedThrough('make', ['level0/level1/level2']);

        $this->getInversedTree()
            ->shouldReturn([
                'level0/level1/level2',
                'level0/level1',
                'level0',
            ]);
    }

}
