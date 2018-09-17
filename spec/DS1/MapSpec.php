<?php

namespace spec\PlanB\DS1;

use Ds\Pair;
use PlanB\DS1\Collection;
use PlanB\DS1\Map;
use PhpSpec\ObjectBehavior;
use PlanB\DS1\Set;
use PlanB\DS1\Vector;
use Prophecy\Argument;
use spec\PlanB\DS1\Traits\TraitMap;


class MapSpec extends ObjectBehavior
{
    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';
    protected const VALUE_E = 'value E';
    protected const VALUE_F = 'value F';

    use TraitMap;

    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Map::class);
        $this->shouldHaveType(Collection::class);
    }

    public function it_return_the_pair_at_a_specified_position_in_the_map()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;


        $this->skip(1)
            ->shouldBeLike(new Pair('b', self::VALUE_B));

    }

    public function it_throws_an_exception_when_skip_at_an_unexists_position_in_the_map()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;


        $this->shouldThrow(\OutOfRangeException::class)->duringSkip(3);
    }

    public function it_returns_the_intesection_with_another_map()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;
        $this['d'] = self::VALUE_D;

        $map = Map::make([
            'b' => self::VALUE_E,
            'c' => self::VALUE_F
        ]);

        $this->intersect($map)
            ->shouldIterateAs([
                'b' => self::VALUE_B,
                'c' => self::VALUE_C
            ]);

    }

    public function it_returns_the_difference_with_another_map()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;
        $this['d'] = self::VALUE_D;

        $map = Map::make([
            'b' => self::VALUE_E,
            'c' => self::VALUE_F
        ]);

        $this->diff($map)
            ->shouldIterateAs([
                'a' => self::VALUE_A,
                'd' => self::VALUE_D
            ]);

    }


    public function it_can_determine_if_a_map_has_a_key()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->hasKey('a')->shouldReturn(true);
        $this->hasKey('b')->shouldReturn(true);

        $this->hasKey('c')->shouldReturn(false);
    }


    public function it_can_determine_if_a_map_has_a_value()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->hasValue(self::VALUE_A)->shouldReturn(true);
        $this->hasValue(self::VALUE_B)->shouldReturn(true);

        $this->hasValue(self::VALUE_C)->shouldReturn(false);

    }

    public function it_returns_a_sequence_with_pairs()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->pairs()
            ->shouldBeLike(Vector::make([
                new Pair('a', self::VALUE_A),
                new Pair('b', self::VALUE_B)
            ]));
    }

    public function it_returns_a_set_with_keys()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->keys()
            ->shouldBeLike(Set::make([
                'a',
                'b'
            ]));
    }


    public function it_returns_a_sequence_with_values()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->values()
            ->shouldBeLike(Vector::make([
                self::VALUE_A,
                self::VALUE_B
            ]));
    }


    public function it_can_be_sorted_in_place_using_keys()
    {
        $this['j'] = self::VALUE_A;
        $this['h'] = self::VALUE_B;
        $this['k'] = self::VALUE_C;
        $this['g'] = self::VALUE_D;
        $this['l'] = self::VALUE_E;
        $this['i'] = self::VALUE_F;

        $sorted = $this->ksort();

        $sorted->shouldIterateAs([
            'g' => self::VALUE_D,
            'h' => self::VALUE_B,
            'i' => self::VALUE_F,
            'j' => self::VALUE_A,
            'k' => self::VALUE_C,
            'l' => self::VALUE_E,
        ]);

        $sorted->shouldReturn($this);
    }

    public function it_can_be_sorted_in_place_with_custom_comparator_using_keys()
    {
        $this['j'] = self::VALUE_A;
        $this['h'] = self::VALUE_B;
        $this['k'] = self::VALUE_C;
        $this['g'] = self::VALUE_D;
        $this['l'] = self::VALUE_E;
        $this['i'] = self::VALUE_F;

        $sorted = $this->ksort(function ($first, $second) {
            return $second <=> $first;
        });

        $sorted->shouldIterateAs([
            'l' => self::VALUE_E,
            'k' => self::VALUE_C,
            'j' => self::VALUE_A,
            'i' => self::VALUE_F,
            'h' => self::VALUE_B,
            'g' => self::VALUE_D,
        ]);

        $sorted->shouldReturn($this);
    }

    public function it_can_be_sorted_in_new_object_using_keys()
    {
        $this['j'] = self::VALUE_A;
        $this['h'] = self::VALUE_B;
        $this['k'] = self::VALUE_C;
        $this['g'] = self::VALUE_D;
        $this['l'] = self::VALUE_E;
        $this['i'] = self::VALUE_F;

        $sorted = $this->ksorted();

        $sorted->shouldIterateAs([
            'g' => self::VALUE_D,
            'h' => self::VALUE_B,
            'i' => self::VALUE_F,
            'j' => self::VALUE_A,
            'k' => self::VALUE_C,
            'l' => self::VALUE_E,
        ]);

        $sorted->shouldNotReturn($this);
    }

    public function it_can_be_sorted_in_new_object_with_custom_comparator_using_keys()
    {
        $this['j'] = self::VALUE_A;
        $this['h'] = self::VALUE_B;
        $this['k'] = self::VALUE_C;
        $this['g'] = self::VALUE_D;
        $this['l'] = self::VALUE_E;
        $this['i'] = self::VALUE_F;

        $sorted = $this->ksorted(function ($first, $second) {
            return $second <=> $first;
        });

        $sorted->shouldIterateAs([
            'l' => self::VALUE_E,
            'k' => self::VALUE_C,
            'j' => self::VALUE_A,
            'i' => self::VALUE_F,
            'h' => self::VALUE_B,
            'g' => self::VALUE_D,
        ]);

        $sorted->shouldNotReturn($this);
    }

    public function it_returns_the_union_with_another_map()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;
        $this['d'] = self::VALUE_D;

        $map = Map::make([
            'b' => self::VALUE_E,
            'c' => self::VALUE_F,
            'e' => self::VALUE_E
        ]);

        $this->union($map)
            ->shouldIterateAs([
                'a' => self::VALUE_A,
                'b' => self::VALUE_E,
                'c' => self::VALUE_F,
                'd' => self::VALUE_D,
                'e' => self::VALUE_E
            ]);
    }

    public function it_returns_the_xor_with_another_map()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;


        $map = Map::make([
            'b' => self::VALUE_B,
            'c' => self::VALUE_C,
            'd' => self::VALUE_D,
            'e' => self::VALUE_E
        ]);

        $this->xor($map)
            ->shouldIterateAs([
                'a' => self::VALUE_A,
                'd' => self::VALUE_D,
                'e' => self::VALUE_E
            ]);

    }
}
