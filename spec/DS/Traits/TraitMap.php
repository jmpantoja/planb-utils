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


use Ds\Pair;

trait TraitMap
{

    public function it_is_empty_when_initialize()
    {
        $this->isEmpty()->shouldReturn(true);
    }

    public function it_is_not_empty_when_add_a_value()
    {
        $this['a'] = self::VALUE_A;
        $this->isEmpty()->shouldReturn(false);
    }


    public function it_count_zero_when_initialize()
    {
        $this->count()->shouldReturn(0);
    }

    public function it_count_one_when_add_a_value()
    {
        $this['a'] = self::VALUE_A;
        $this->count()->shouldReturn(1);
    }

    public function it_count_two_when_add_two_values()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->count()->shouldReturn(2);
    }


    public function it_has_same_elements_when_cloned()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $copy = $this->copy();

        $copy->shouldIterateAs([
            'a' => self::VALUE_A,
            'b' => self::VALUE_B
        ]);

        $copy->shouldHaveType(get_class($this->getWrappedObject()));
    }

    public function it_is_empty_after_clean()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->isEmpty()->shouldBeLike(false);

        $this->clear();
        $this->isEmpty()->shouldBeLike(true);
    }


    public function it_determine_if_an_index_exists()
    {
        $this->offsetExists('a')->shouldReturn(false);

        $this['a'] = self::VALUE_A;
        $this->offsetExists('a')->shouldReturn(true);
    }

    public function it_can_retrieve_an_value_by_index()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this['a']->shouldReturn(self::VALUE_A);
        $this['b']->shouldReturn(self::VALUE_B);

    }

    public function it_can_overwrite_an_value_by_index()
    {
        $this['a'] = self::VALUE_A;
        $this['a']->shouldReturn(self::VALUE_A);

        $this['a'] = self::VALUE_B;
        $this['a']->shouldReturn(self::VALUE_B);
    }

    public function it_can_unset_a_value_by_index()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        unset($this['a']);

        $this['b']->shouldReturn(self::VALUE_B);
        $this->count()->shouldReturn(1);
    }

    public function it_gets_iterator_based_on_internal_array()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->getIterator()->shouldIterateAs([
            'a' => self::VALUE_A,
            'b' => self::VALUE_B
        ]);

    }

    public function it_retrieve_internal_array_when_json_serialize()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->jsonSerialize()->shouldReturn([
            'a' => self::VALUE_A,
            'b' => self::VALUE_B
        ]);
    }

    public function it_retrieve_internal_array_when_converts_to_array()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->toArray()->shouldReturn([
            'a' => self::VALUE_A,
            'b' => self::VALUE_B
        ]);
    }


    public function it_retrieve_internal_array_when_debug_info()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->__debugInfo()->shouldReturn([
            'a' => self::VALUE_A,
            'b' => self::VALUE_B
        ]);
    }

    public function it_apply_a_callback_to_each_element()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->each(function (string $key, string $value) {
            return strtoupper($value);
        });

        $this->shouldIterateAs([
            'a' => 'VALUE A',
            'b' => 'VALUE B',
        ]);
    }


    public function it_can_be_merged_with_another_set_of_values()
    {
        $this['a'] = self::VALUE_A;

        $merged = $this->merge([
            'a' => self::VALUE_B,
            'b' => self::VALUE_C
        ]);

        $merged->shouldIterateAs([
            'a' => self::VALUE_B,
            'b' => self::VALUE_C
        ]);

        $merged->shouldNotReturn($this);
    }

    public function it_retrieve_a_filtered_set_of_values_using_default_filter()
    {
        $this['a'] = self::VALUE_A;
        $this['x'] = '';
        $this['b'] = self::VALUE_B;
        $this['y'] = null;
        $this['c'] = self::VALUE_C;

        $this->filter()
            ->shouldIterateAs([
                'a' => self::VALUE_A,
                'b' => self::VALUE_B,
                'c' => self::VALUE_C
            ]);
    }

    public function it_returns_a_filtered_set_of_values_using_custom_filter()
    {
        $this['a'] = self::VALUE_A;
        $this['x'] = [1, 2, 3];
        $this['b'] = self::VALUE_B;
        $this['y'] = 58456;
        $this['c'] = self::VALUE_C;

        $this
            ->filter(function ($key, $value) {
                return is_string($value);
            })
            ->shouldIterateAs([
                'a' => self::VALUE_A,
                'b' => self::VALUE_B,
                'c' => self::VALUE_C
            ]);

    }

    public function it_returns_a_value_by_key()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->get('a')->shouldReturn(self::VALUE_A);
        $this->get('b')->shouldReturn(self::VALUE_B);

    }

    public function it_returns_default_value_when_try_gets_an_unexists_key()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;

        $this->get('c')->shouldReturn(null);
        $this->get('c', self::VALUE_C)->shouldReturn(self::VALUE_C);
    }

    public function it_retrieve_a_mapped_set_of_values()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;

        $mapped = $this->map(function (string $key, string $value) {
            return strtoupper($value);
        });

        $mapped->shouldIterateAs([
            'a' => 'VALUE A',
            'b' => 'VALUE B',
            'c' => 'VALUE C'
        ]);

        $mapped->shouldNotReturn($this);
    }


    public function it_returns_the_first_element()
    {

        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;

        $this->first()
            ->shouldBeLike(new Pair('a', self::VALUE_A));
    }

    public function it_returns_the_last_element()
    {

        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;

        $this->last()
            ->shouldBeLike(new Pair('b', self::VALUE_B));
    }

    public function it_reduce_a_map_to_single_value()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;


        $this->reduce(function (string $carry, string $key, string $value) {
            return sprintf('%s %s', $carry, $value);
        }, '->')
            ->shouldReturn('-> value A value B value C');
    }


    public function it_can_be_reverse_in_place()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;

        $this->reverse()
            ->shouldReturn($this);

        $this->shouldIterateAs([
            'c' => self::VALUE_C,
            'b' => self::VALUE_B,
            'a' => self::VALUE_A,
        ]);
    }

    public function it_can_be_reverse_in_new_object()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;

        $reversed = $this->reversed();
        $reversed->shouldNotReturn($this);

        $reversed->shouldIterateAs([
            'c' => self::VALUE_C,
            'b' => self::VALUE_B,
            'a' => self::VALUE_A,
        ]);
    }


    public function it_returns_a_sliced_part_of_sequence()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;
        $this['d'] = self::VALUE_D;
        $this['e'] = self::VALUE_E;
        $this['f'] = self::VALUE_F;

        $this->slice(2, 3)
            ->shouldIterateAs([
                'c' => self::VALUE_C,
                'd' => self::VALUE_D,
                'e' => self::VALUE_E,
            ]);
    }

    public function it_returns_a_sliced_part_of_sequence_from_an_index_to_end()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;
        $this['d'] = self::VALUE_D;
        $this['e'] = self::VALUE_E;
        $this['f'] = self::VALUE_F;

        $this->slice(2)
            ->shouldIterateAs([
                'c' => self::VALUE_C,
                'd' => self::VALUE_D,
                'e' => self::VALUE_E,
                'f' => self::VALUE_F,
            ]);
    }

    public function it_returns_a_sliced_part_of_sequence_from_end_to_an_index()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;
        $this['d'] = self::VALUE_D;
        $this['e'] = self::VALUE_E;
        $this['f'] = self::VALUE_F;

        $this->slice(-2)
            ->shouldIterateAs([
                'e' => self::VALUE_E,
                'f' => self::VALUE_F,
            ]);
    }

    public function it_can_be_sorted_in_place_using_values()
    {
        $this['e'] = self::VALUE_E;
        $this['c'] = self::VALUE_C;
        $this['a'] = self::VALUE_A;
        $this['f'] = self::VALUE_F;
        $this['b'] = self::VALUE_B;
        $this['d'] = self::VALUE_D;

        $sorted = $this->sort();

        $sorted->shouldIterateAs([
            'a' => self::VALUE_A,
            'b' => self::VALUE_B,
            'c' => self::VALUE_C,
            'd' => self::VALUE_D,
            'e' => self::VALUE_E,
            'f' => self::VALUE_F,
        ]);

        $sorted->shouldReturn($this);
    }

    public function it_can_be_sorted_in_place_with_custom_comparator_using_values()
    {
        $this['e'] = self::VALUE_E;
        $this['c'] = self::VALUE_C;
        $this['a'] = self::VALUE_A;
        $this['f'] = self::VALUE_F;
        $this['b'] = self::VALUE_B;
        $this['d'] = self::VALUE_D;

        $sorted = $this->sort(function ($first, $second) {
            return $second <=> $first;
        });

        $sorted->shouldIterateAs([
            'f' => self::VALUE_F,
            'e' => self::VALUE_E,
            'd' => self::VALUE_D,
            'c' => self::VALUE_C,
            'b' => self::VALUE_B,
            'a' => self::VALUE_A,
        ]);

        $sorted->shouldReturn($this);
    }

    public function it_can_be_sorted_in_new_object_using_values()
    {
        $this['e'] = self::VALUE_E;
        $this['c'] = self::VALUE_C;
        $this['a'] = self::VALUE_A;
        $this['f'] = self::VALUE_F;
        $this['b'] = self::VALUE_B;
        $this['d'] = self::VALUE_D;

        $sorted = $this->sorted();

        $sorted->shouldIterateAs([
            'a' => self::VALUE_A,
            'b' => self::VALUE_B,
            'c' => self::VALUE_C,
            'd' => self::VALUE_D,
            'e' => self::VALUE_E,
            'f' => self::VALUE_F,
        ]);

        $sorted->shouldNotReturn($this);
    }

    public function it_can_be_sorted_in_new_object_with_custom_comparator_using_values()
    {
        $this['e'] = self::VALUE_E;
        $this['c'] = self::VALUE_C;
        $this['a'] = self::VALUE_A;
        $this['f'] = self::VALUE_F;
        $this['b'] = self::VALUE_B;
        $this['d'] = self::VALUE_D;

        $sorted = $this->sorted(function ($first, $second) {
            return $second <=> $first;
        });

        $sorted->shouldIterateAs([
            'f' => self::VALUE_F,
            'e' => self::VALUE_E,
            'd' => self::VALUE_D,
            'c' => self::VALUE_C,
            'b' => self::VALUE_B,
            'a' => self::VALUE_A,
        ]);

        $sorted->shouldNotReturn($this);
    }

    public function it_can_add_one_key_value_pair()
    {
        $this['a'] = self::VALUE_A;
        $this->put('b', self::VALUE_B);

        $this['b']->shouldReturn(self::VALUE_B);
        $this->get('a')->shouldReturn(self::VALUE_A);
    }


    public function it_can_add_one_or_more_key_value_pairs()
    {

        $this->putAll([
            'a' => self::VALUE_A,
            'b' => self::VALUE_B,
            'c' => self::VALUE_C
        ]);

        $this->shouldIterateAs([
            'a' => self::VALUE_A,
            'b' => self::VALUE_B,
            'c' => self::VALUE_C
        ]);
    }


    public function it_can_remove_a_value_by_key()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;

        $this->remove('b')
            ->shouldReturn(self::VALUE_B);

        $this->shouldIterateAs([
            'a' => self::VALUE_A,
            'c' => self::VALUE_C
        ]);
    }

    public function it_returns_a_default_value_when_trying_remove_an_unexist_key()
    {
        $this['a'] = self::VALUE_A;
        $this['b'] = self::VALUE_B;
        $this['c'] = self::VALUE_C;


        $removed = $this->remove('b');
        $removed->shouldReturn(self::VALUE_B);

        $removed = $this->remove('b', self::VALUE_C);
        $removed->shouldReturn(self::VALUE_C);

    }

}
