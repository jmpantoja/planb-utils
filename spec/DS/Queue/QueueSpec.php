<?php

namespace spec\PlanB\DS\Queue;

use PlanB\DS\Collection;
use PlanB\DS\Queue\Queue;
use PhpSpec\ObjectBehavior;
use PlanB\Type\DataType\DataType;
use PlanB\Type\DataType\Type;
use Prophecy\Argument;
use spec\PlanB\DS\Traits\TraitCollection;
use spec\PlanB\DS\Traits\TraitConverts;
use spec\PlanB\DS\Traits\TraitNoArray;

class QueueSpec extends ObjectBehavior
{
    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';
    protected const VALUE_E = 'value E';
    protected const VALUE_F = 'value F';

    use TraitCollection;
    use TraitConverts;
    use TraitNoArray;

    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Queue::class);
        $this->shouldHaveType(Collection::class);

    }

    public function it_can_be_created_with_a_type()
    {
        $this->beConstructedThrough('typed', [Type::NUMERIC]);

        $this->getInnerType()->shouldBeLike(
            DataType::make(Type::NUMERIC)
        );
    }

    public function it_returns_the_value_at_the_front_of_the_queue_without_removing_it()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->count()->shouldReturn(2);
        $this->peek()->shouldReturn(self::VALUE_A);
        $this->peek()->shouldReturn(self::VALUE_A);

        $this->count()->shouldReturn(2);
    }

    public function it_returns_the_value_at_the_top_of_the_stack_and_removing_it()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->count()->shouldReturn(2);

        $this->pop()->shouldReturn(self::VALUE_A);
        $this->count()->shouldReturn(1);

        $this->pop()->shouldReturn(self::VALUE_B);
        $this->count()->shouldReturn(0);
    }


    public function it_can_add_one_or_more_values_on_end_of_queue()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;

        $this->pushAll([
            self::VALUE_D,
            self::VALUE_E,
            self::VALUE_F
        ]);

        $this->shouldIterateAs([
            self::VALUE_A,
            self::VALUE_B,
            self::VALUE_C,
            self::VALUE_D,
            self::VALUE_E,
            self::VALUE_F,
        ]);
    }
}
