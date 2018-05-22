<?php

declare(strict_types=1);

namespace spec\PlanB\Type;


use PhpSpec\Wrapper\Wrapper;
use PlanB\Type\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\PlanB\Type\Stub\Word;

class CollectionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('string');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Collection::class);
    }

    public function it_is_countable()
    {
        $this->shouldHaveType(\Countable::class);
    }

    public function it_count_zero_when_intialize()
    {
        $this->count()->shouldReturn(0);
        $this->isEmpty()->shouldReturn(true);
    }

    public function it_each_element_is_passed_to_callable()
    {
        $this->beConstructedWith(Word::class);
        $this->itemAppendAll([
            Word::fromString('uno'),
            Word::fromString('dos'),
            Word::fromString('tres')

        ]);

        $this->each(function (Word $word, int $key, string $userdata) {
            $word->toUpper()
                ->concat(sprintf('[%s]', $key))
                ->concat($userdata);
        }, '<=');

        $this->itemGet(0)->__toString()->shouldReturn('UNO [0] <=');
        $this->itemGet(1)->__toString()->shouldReturn('DOS [1] <=');
        $this->itemGet(2)->__toString()->shouldReturn('TRES [2] <=');
    }

    public function it_each_method_return_instance_on_empty()
    {
        $this->beConstructedWith(Word::class);

        $this->each(function (Word $word, int $key, string $userdata) {
            $word->toUpper();
        })->shouldReturn($this);
    }


    public function it_each_element_is_mapped_to_callable()
    {
        $this->beConstructedWith(Word::class);
        $this->itemSetAll([
            Word::fromString('uno'),
            Word::fromString('dos'),
            Word::fromString('tres')

        ]);

        $response = $this->map(function (Word $word, int $key, string $userdata) : string {
            return $word->toUpper()
                ->concat(sprintf('[%s]', $key))
                ->concat($userdata)
                ->__toString();

        }, '<=');

        $response->shouldHaveType(Collection::class);

        $response->itemGet(0)->shouldReturn('UNO [0] <=');
        $response->itemGet(1)->shouldReturn('DOS [1] <=');
        $response->itemGet(2)->shouldReturn('TRES [2] <=');
    }

    public function it_map_method_return_instance_on_empty()
    {
        $this->beConstructedWith(Word::class);

        $response = $this->map(function (Word $word) {
            $word->toUpper();
        });

        $response->shouldNotReturn($this);
        $response->shouldHaveType(Collection::class);
    }
}
