<?php

/**
 * This file is part of the planb project.
 *
 * (c) jmpantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\PlanB\DS\Traits;


use Ds\Sequence;

trait TraitSequence
{

    public function it_is_initializable()
    {
        $this->shouldHaveType(TraitSequence::class);
        $this->shouldHaveType(TraitCollection::class);
    }

    public function it_apply_a_callback_to_each_element()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->each(function (string $value) {
            return strtoupper($value);
        });

        $this->shouldIterateAs([
            'VALUE A',
            'VALUE B',
        ]);
    }

    public function it_determine_if_contains_some_values()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->contains(self::VALUE_A)->shouldReturn(true);
        $this->contains(self::VALUE_B)->shouldReturn(true);
        $this->contains(self::VALUE_A, self::VALUE_B)->shouldReturn(true);

        $this->contains(self::VALUE_C)->shouldReturn(false);
        $this->contains(self::VALUE_A, self::VALUE_C)->shouldReturn(false);

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

    public function it_returns_the_first_corresponding_key_when_find_a_value()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->find(self::VALUE_A)->shouldReturn(0);
        $this->find(self::VALUE_B)->shouldReturn(2);
        $this->find(self::VALUE_C)->shouldReturn(null);
    }

    public function it_returns_all_corresponding_key_when_find_a_value()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->findAll(self::VALUE_A)->shouldReturn([0, 1]);
        $this->findAll(self::VALUE_B)->shouldReturn([2]);
        $this->findAll(self::VALUE_C)->shouldReturn(null);
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


    public function it_returns_a_value_by_index()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->get(0)->shouldReturn(self::VALUE_A);
        $this->get(1)->shouldReturn(self::VALUE_B);
    }

    public function it_throws_an_exception_when_try_gets_an_unexists_key()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->shouldThrow(\OutOfRangeException::class)->duringGet(2);
    }

    public function it_can_insert_new_elements_on_a_index()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->insert(1, self::VALUE_C, self::VALUE_C, self::VALUE_C);

        $this->shouldIterateAs([
            self::VALUE_A,
            self::VALUE_C,
            self::VALUE_C,
            self::VALUE_C,
            self::VALUE_B,
        ]);
    }

    public function it_can_insert_new_elements_on_the_next_index()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->insert(2, self::VALUE_C, self::VALUE_C, self::VALUE_C);

        $this->shouldIterateAs([
            self::VALUE_A,
            self::VALUE_B,
            self::VALUE_C,
            self::VALUE_C,
            self::VALUE_C,
        ]);
    }

    public function it_throws_an_exception_when_try_insert_values_on_an_unexist_index()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->shouldThrow(\OutOfRangeException::class)->duringInsert(3, self::VALUE_C);
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

    public function it_retrieve_a_mapped_set_of_values()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;

        $mapped = $this->map(function (string $value) {
            return strtoupper($value);
        });

        $mapped->shouldIterateAs([
            'VALUE A',
            'VALUE B',
            'VALUE C'
        ]);

        $mapped->shouldNotReturn($this);
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

    public function it_can_add_one_or_more_values_on_end_of_sequence()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;

        $this->push(...[
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

    public function it_delete_and_returns_the_last_element()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;


        $this->count()->shouldReturn(3);

        $this->pop()->shouldReturn(self::VALUE_B);
        $this->count()->shouldReturn(2);

        $this->pop()->shouldReturn(self::VALUE_A);
        $this->count()->shouldReturn(1);

    }

    public function it_throws_an_exception_when_pop_the_last_element_on_empty_sequence()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;


        $this->count()->shouldReturn(2);

        $this->pop()->shouldReturn(self::VALUE_B);
        $this->count()->shouldReturn(1);

        $this->pop()->shouldReturn(self::VALUE_A);
        $this->count()->shouldReturn(0);

        $this->shouldThrow(\UnderflowException::class)->duringPop();

    }

    public function it_reduce_a_sequence_to_single_value()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;


        $this->reduce(function (string $carry, string $value) {
            return sprintf('%s %s', $carry, $value);
        }, '->')
            ->shouldReturn('-> value A value B value C');
    }

    public function it_can_remove_a_value_by_index()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;

        $this->remove(1)
            ->shouldReturn(self::VALUE_B);

        $this->shouldIterateAs([
            0 => self::VALUE_A,
            1 => self::VALUE_C
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

    public function it_can_be_rotate_one_time()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_D;
        $this[] = self::VALUE_E;
        $this[] = self::VALUE_F;

        $this->rotate(1)
            ->shouldIterateAs([
                self::VALUE_B,
                self::VALUE_C,
                self::VALUE_D,
                self::VALUE_E,
                self::VALUE_F,
                self::VALUE_A,
            ]);
    }

    public function it_can_be_rotate_very_times()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_D;
        $this[] = self::VALUE_E;
        $this[] = self::VALUE_F;

        $this->rotate(3)
            ->shouldIterateAs([
                self::VALUE_D,
                self::VALUE_E,
                self::VALUE_F,
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ]);
    }

    public function it_can_be_rotate_very_negative_times()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;
        $this[] = self::VALUE_D;
        $this[] = self::VALUE_E;
        $this[] = self::VALUE_F;

        $this->rotate(-3)
            ->shouldIterateAs([
                self::VALUE_D,
                self::VALUE_E,
                self::VALUE_F,
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ]);
    }

    public function it_replace_a_value_by_index()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;

        $this->set(2, self::VALUE_F);

        $this->shouldIterateAs([
            self::VALUE_A,
            self::VALUE_B,
            self::VALUE_F,
        ]);
    }

    public function it_throws_an_exception_when_trying_replace_an_unexists_index()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;

        $this->shouldThrow(\OutOfRangeException::class)->duringSet(3, self::VALUE_F);
    }

    public function it_delete_and_returns_the_first_element()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;
        $this[] = self::VALUE_C;


        $this->count()->shouldReturn(3);

        $this->shift()->shouldReturn(self::VALUE_A);
        $this->count()->shouldReturn(2);

        $this->shift()->shouldReturn(self::VALUE_B);
        $this->count()->shouldReturn(1);

    }

    public function it_throws_an_exception_when_shift_the_first_element_on_empty_sequence()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->count()->shouldReturn(2);

        $this->shift()->shouldReturn(self::VALUE_A);
        $this->count()->shouldReturn(1);

        $this->shift()->shouldReturn(self::VALUE_B);
        $this->count()->shouldReturn(0);

        $this->shouldThrow(\UnderflowException::class)->duringShift();

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


    public function it_can_add_one_or_more_values_on_the_front_of_sequence()
    {

        $this[] = self::VALUE_D;
        $this[] = self::VALUE_E;
        $this[] = self::VALUE_F;

        $this->unshift(...[
            self::VALUE_A,
            self::VALUE_B,
            self::VALUE_C
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

    public function it_can_retrieve_the_max()
    {

        $this[] = 'mediano';
        $this[] = 'corta';
        $this[] = 'cadena larga';

        $this
            ->max(function ($fist, $second) {
                return strlen($fist) <=> strlen($second);
            })
            ->shouldReturn('cadena larga');

    }

    public function it_can_retrieve_the_min()
    {

        $this[] = 'mediano';
        $this[] = 'corta';
        $this[] = 'cadena larga';


        $this
            ->min(function ($fist, $second) {
                return strlen($fist) <=> strlen($second);
            })
            ->shouldReturn('corta');

    }

}
