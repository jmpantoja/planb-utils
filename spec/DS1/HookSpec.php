<?php

namespace spec\PlanB\DS1;

use PlanB\DS1\Borrame;
use PhpSpec\ObjectBehavior;
use PlanB\DS1\Deque;
use PlanB\DS1\Map;
use PlanB\DS1\PriorityQueue;
use PlanB\DS1\Queue;
use PlanB\DS1\Resolver\Input\Input;
use PlanB\DS1\Resolver\Resolver;
use PlanB\DS1\Set;
use PlanB\DS1\Stack;
use PlanB\DS1\Vector;
use Prophecy\Argument;

class HookSpec extends ObjectBehavior
{

    private function build(string $className, Resolver $resolver, $first, $last): void
    {
        $this->beAnInstanceOf($className);
        $this->beConstructedThrough('make');

        $range = range($first, $last);

        $this->bind($resolver);

        foreach ($range as $value) {
            $resolver->resolve($value)
                ->shouldBeCalledTimes(1)
                ->will(function ($value) {
                    $value = array_pop($value);
                    return Input::make($value);
                });
        }
    }

    public function it_resolve_vector(Resolver $resolver)
    {
        $this->build(Vector::class, $resolver, 'A', 'J');

        $this->push('A', 'B');
        $this->pushAll([
            'C',
            'D'
        ]);

        $this->set(0, 'E');
        $this->insert(1, 'F', 'G');
        $this->unshift('H', 'I');
        $this[] = 'J';
    }

    public function it_resolve_deque(Resolver $resolver)
    {
        $this->build(Deque::class, $resolver, 'A', 'J');

        $this
            ->push('A', 'B')
            ->pushAll([
                'C',
                'D'
            ])
            ->set(0, 'E')
            ->insert(1, 'F', 'G')
            ->unshift('H', 'I');

        $this[] = 'J';

    }

    public function it_example_stack(Resolver $resolver)
    {
        $this->build(Stack::class, $resolver, 'A', 'C');

        $this->push('A', 'B');
        $this[] = 'C';
    }

    public function it_example_queue(Resolver $resolver)
    {
        $this->build(Queue::class, $resolver, 'A', 'C');

        $this->push('A', 'B');
        $this[] = 'C';
    }

    public function it_example_priority_queue(Resolver $resolver)
    {

        $this->build(PriorityQueue::class, $resolver, 'A', 'C');

        $this->push('A', 1);
        $this->push('B', 2);
        $this->push('C', 3);

    }

    public function it_example_set(Resolver $resolver)
    {
        $this->build(Set::class, $resolver, 'A', 'C');

        $this->add('A', 'B');
        $this[] = 'C';
    }

    public function it_example_map(Resolver $resolver)
    {
        $this->build(Map::class, $resolver, 'A', 'D');

        $this['a'] = 'A';

        $this->putAll([
            'b' => 'B',
            'c' => 'C',
        ]);

        $this->put('d', 'D');
    }
}
