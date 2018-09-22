<?php

namespace spec\PlanB\DS\Set;

use PlanB\DS\Set\Set;
use PhpSpec\ObjectBehavior;
use PlanB\Type\DataType\DataType;
use PlanB\Type\DataType\Type;
use Prophecy\Argument;
use spec\PlanB\DS\Traits\TraitCollection;
use spec\PlanB\DS\Traits\TraitConverts;
use spec\PlanB\DS\Traits\TraitNoArray;

class SetSpec extends ObjectBehavior
{
    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';
    protected const VALUE_E = 'value E';
    protected const VALUE_F = 'value F';

    use TraitCollection;
    use TraitConverts;

    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Set::class);
    }

    public function it_can_be_created_with_a_type()
    {
        $this->beConstructedThrough('typed', [Type::NUMERIC]);

        $this->getInnerType()->shouldBeLike(
            DataType::create(Type::NUMERIC)
        );
    }

    public function it_can_add_one_or_more_values_to_set()
    {

        $this->add(self::VALUE_A);
        $this->addAll([self::VALUE_B, self::VALUE_C, self::VALUE_D]);

        $this->count()->shouldReturn(4);

        $this[0]->shouldReturn(self::VALUE_A);
        $this[1]->shouldReturn(self::VALUE_B);
        $this[2]->shouldReturn(self::VALUE_C);
        $this[3]->shouldReturn(self::VALUE_D);
    }


    public function it_throws_an_exception_when_determine_if_an_index_exists()
    {
        $this->shouldThrow(\Error::class)->duringOffsetExists(0);
    }


    public function it_throws_an_exception_when_retrieve_an_value_by_index()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;

        $this[1]->shouldReturn(self::VALUE_B);
    }

    public function it_throws_an_exception_when_overwrite_an_value_by_index()
    {
        $this->shouldNotThrow(\Error::class)->duringOffsetSet(null, self::VALUE_A);
        $this->shouldThrow(\OutOfBoundsException::class)->duringOffsetSet('key', self::VALUE_A);
    }

    public function it_throws_an_exception_when_unset_a_value()
    {
        $this[] = self::VALUE_A;
        $this->shouldThrow(\Error::class)->duringOffsetUnSet(0);
    }


    public function it_returns_the_difference_with_another_set()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_D;

        $set = Set::make([
            self::VALUE_B,
            self::VALUE_C
        ]);

        $this->diff($set)
            ->shouldIterateAs([
                self::VALUE_A,
                self::VALUE_D
            ]);

    }

    public function it_returns_the_xor_with_another_set()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;


        $set = Set::make([
            self::VALUE_B,
            self::VALUE_C,
            self::VALUE_D,
            self::VALUE_E
        ]);

        $this->xor($set)
            ->shouldIterateAs([
                self::VALUE_A,
                self::VALUE_D,
                self::VALUE_E
            ]);

    }

    public function it_retrieve_a_filtered_set_of_values_using_default_filter()
    {
        $this[] = self::VALUE_A;
        $this[] = '';
        $this[] = self::VALUE_B;
        $this[] = null;
        $this[] = self::VALUE_C;

        $this->filter()
            ->shouldIterateAs([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C
            ]);
    }

    public function it_returns_a_filtered_set_of_values_using_custom_filter()
    {
        $this[] = self::VALUE_A;
        $this[] = [1, 2, 3];
        $this[] = self::VALUE_B;
        $this[] = 58456;
        $this[] = self::VALUE_C;

        $this
            ->filter(function ($value) {
                return is_string($value);
            })
            ->shouldIterateAs([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C
            ]);

    }

    public function it_returns_the_first_element()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->first()->shouldReturn(self::VALUE_A);
        $this->first()->shouldReturn(self::VALUE_A);
    }


    public function it_throws_an_exception_when_try_returns_the_first_element_on_an_empty_sequence()
    {
        $this->shouldThrow(\UnderflowException::class)->duringFirst();
    }


    public function it_returns_the_last_element()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->last()->shouldReturn(self::VALUE_B);
        $this->last()->shouldReturn(self::VALUE_B);
    }


    public function it_throws_an_exception_when_try_returns_the_last_element_on_an_empty_sequence()
    {
        $this->shouldThrow(\UnderflowException::class)->duringLast();
    }


    public function it_returns_a_value_by_position()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->get(0)->shouldReturn(self::VALUE_A);
        $this->get(1)->shouldReturn(self::VALUE_B);

    }

    public function it_returns_the_intesection_with_another_set()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_D;

        $set = Set::make([
            self::VALUE_B,
            self::VALUE_C
        ]);

        $this->intersect($set)
            ->shouldIterateAs([
                self::VALUE_B,
                self::VALUE_C
            ]);

    }

    public function it_reduce_a_set_to_single_value()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;


        $this->reduce(function (string $carry, string $value) {
            return sprintf('%s %s', $carry, $value);
        }, '->')
            ->shouldReturn('-> value A value B value C');
    }


    public function it_can_remove_one_or_more_values_by_key()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_D;

        $this->remove(self::VALUE_B, self::VALUE_C);

        $this->shouldIterateAs([
            self::VALUE_A,
            self::VALUE_D
        ]);
    }

    public function it_can_be_reverse_in_place()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;

        $this->reverse()
            ->shouldReturn($this);

        $this->shouldIterateAs([
            self::VALUE_C,
            self::VALUE_B,
            self::VALUE_A,
        ]);
    }

    public function it_can_be_reverse_in_new_object()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;

        $reversed = $this->reversed();
        $reversed->shouldNotReturn($this);

        $reversed->shouldIterateAs([
            self::VALUE_C,
            self::VALUE_B,
            self::VALUE_A,
        ]);
    }

    public function it_returns_a_sliced_part_of_sequence()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_D;
        $this[] = self::VALUE_E;
        $this[] = self::VALUE_F;

        $this->slice(2, 3)
            ->shouldIterateAs([
                self::VALUE_C,
                self::VALUE_D,
                self::VALUE_E,
            ]);
    }

    public function it_returns_a_sliced_part_of_sequence_from_an_index_to_end()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_D;
        $this[] = self::VALUE_E;
        $this[] = self::VALUE_F;

        $this->slice(2)
            ->shouldIterateAs([
                self::VALUE_C,
                self::VALUE_D,
                self::VALUE_E,
                self::VALUE_F,
            ]);
    }

    public function it_returns_a_sliced_part_of_sequence_from_end_to_an_index()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_D;
        $this[] = self::VALUE_E;
        $this[] = self::VALUE_F;

        $this->slice(-2)
            ->shouldIterateAs([
                self::VALUE_E,
                self::VALUE_F,
            ]);
    }


    public function it_can_be_sorted_in_place()
    {
        $this[] = self::VALUE_E;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_F;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_D;

        $sorted = $this->sort();

        $sorted->shouldIterateAs([
            self::VALUE_A,
            self::VALUE_B,
            self::VALUE_C,
            self::VALUE_D,
            self::VALUE_E,
            self::VALUE_F,
        ]);

        $sorted->shouldReturn($this);
    }


    public function it_can_be_sorted_in_place_with_custom_comparator()
    {
        $this[] = self::VALUE_E;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_F;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_D;

        $sorted = $this->sort(function ($first, $second) {
            return $second <=> $first;
        });

        $sorted->shouldIterateAs([
            self::VALUE_F,
            self::VALUE_E,
            self::VALUE_D,
            self::VALUE_C,
            self::VALUE_B,
            self::VALUE_A,
        ]);

        $sorted->shouldReturn($this);
    }

    public function it_can_be_sorted_in_new_object()
    {
        $this[] = self::VALUE_E;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_F;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_D;

        $sorted = $this->sorted();

        $sorted->shouldIterateAs([
            self::VALUE_A,
            self::VALUE_B,
            self::VALUE_C,
            self::VALUE_D,
            self::VALUE_E,
            self::VALUE_F,
        ]);

        $sorted->shouldNotReturn($this);
    }

    public function it_can_be_sorted_in_new_object_with_custom_comparator()
    {
        $this[] = self::VALUE_E;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_F;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_D;

        $sorted = $this->sorted(function ($first, $second) {
            return $second <=> $first;
        });

        $sorted->shouldIterateAs([
            self::VALUE_F,
            self::VALUE_E,
            self::VALUE_D,
            self::VALUE_C,
            self::VALUE_B,
            self::VALUE_A,
        ]);

        $sorted->shouldNotReturn($this);
    }

    public function it_can_be_merged_with_another_set_of_values()
    {
        $this[] = self::VALUE_A;

        $merged = $this->merge([
            self::VALUE_B,
            self::VALUE_C
        ]);

        $merged->shouldIterateAs([
            self::VALUE_A,
            self::VALUE_B,
            self::VALUE_C,
        ]);

        $merged->shouldNotReturn($this);
    }

    public function it_returns_the_union_with_another_map()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_D;

        $map = Set::make([
            self::VALUE_E,
            self::VALUE_F,
        ]);

        $this->union($map)
            ->shouldIterateAs([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
                self::VALUE_D,
                self::VALUE_E,
                self::VALUE_F
            ]);
    }
}
