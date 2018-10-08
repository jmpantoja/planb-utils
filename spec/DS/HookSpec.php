<?php

namespace spec\PlanB\DS;


use PhpSpec\ObjectBehavior;
use PlanB\DS\Deque\Deque;
use PlanB\DS\Map\Map;
use PlanB\DS\PriorityQueue\PriorityQueue;
use PlanB\DS\Queue\Queue;
use PlanB\DS\Resolver\Input;
use PlanB\DS\Resolver\ResolvedValuesList;
use PlanB\DS\Resolver\AbstractResolver;
use PlanB\DS\Set\Set;
use PlanB\DS\Stack\Stack;
use PlanB\DS\Vector\Vector;
use Prophecy\Argument;

class HookSpec extends ObjectBehavior
{

    private function buildWithRange(string $className, AbstractResolver $resolver, ...$values): void
    {
        $this->beAnInstanceOf($className);

        $this->beConstructedWith([], $resolver);


        foreach ($values as $key => $value) {

            if (is_array($value)) {
                $prophecy = $resolver->resolve(...$value);
            } else {
                $prophecy = $resolver->resolve($value);
            }

            $prophecy->shouldBeCalledTimes(1)
                ->will(function ($value) use ($key) {
                    $list = ResolvedValuesList::make();

                    $value = array_pop($value);
                    $list->set(null, Input::make($value));

                    return $list;
                });
        }
    }
//
//    public function it_resolve_vector(Resolver $resolver)
//    {
//        $this->buildWithRange(Vector::class, $resolver, ['G', 'H'], ['I', 'J'], ...range('A', 'F'));
//
//        $this
//            ->push('A', 'B')
//            ->pushAll([
//                'C',
//                'D'
//            ])
//            ->set(0, 'E');
//        $this[] = 'F';
//
//        $this->insert(1, 'G', 'H');
//        $this->unshift('I', 'J');
//
//    }
//
//    public function it_resolve_deque(Resolver $resolver)
//    {
//        $this->buildWithRange(Deque::class, $resolver, ['G', 'H'], ['I', 'J'], ...range('A', 'F'));
//
//        $this
//            ->push('A', 'B')
//            ->pushAll([
//                'C',
//                'D'
//            ])
//            ->set(0, 'E');
//        $this[] = 'F';
//
//        $this->insert(1, 'G', 'H');
//        $this->unshift('I', 'J');
//    }
//
//    public function it_example_stack(Resolver $resolver)
//    {
//        $this->buildWithRange(Stack::class, $resolver, ...range('A', 'D'));
//
//        $this->push('A');
//        $this->pushAll(['B', 'C']);
//        $this[] = 'D';
//    }
//
//    public function it_example_queue(Resolver $resolver)
//    {
//        $this->buildWithRange(Queue::class, $resolver, ...range('A', 'D'));
//
//        $this->push('A');
//        $this->pushAll(['B', 'C']);
//        $this[] = 'D';
//    }
//
//    public function it_example_priority_queue(Resolver $resolver)
//    {
//
//        $this->buildWithRange(PriorityQueue::class, $resolver, ...range('A', 'C'));
//
//        $this->push('A', 1);
//        $this->push('B', 2);
//        $this->push('C', 3);
//
//    }
//
//    public function it_example_set(Resolver $resolver)
//    {
//        $this->buildWithRange(Set::class, $resolver, ...range('A', 'D'));
//
//        $this->add('A');
//        $this->addAll(['B', 'C']);
//        $this[] = 'D';
//    }
//
//    public function it_example_map(Resolver $resolver)
//    {
//        $this->buildWithRange(Map::class, $resolver, ...range('A', 'D'));
//
//        $this['a'] = 'A';
//
//        $this->putAll([
//            'b' => 'B',
//            'c' => 'C',
//        ]);
//
//        $this->put('d', 'D');
//    }
}
