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

namespace spec\PlanB\DS1\Traits;


trait TraitArray
{

    public function it_determine_if_an_index_exists()
    {
        $this->offsetExists(0)->shouldReturn(false);

        $this[] = self::VALUE_A;
        $this->offsetExists(0)->shouldReturn(true);
    }

    public function it_can_retrieve_an_value_by_index()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this[0]->shouldReturn(self::VALUE_A);
        $this[1]->shouldReturn(self::VALUE_B);

    }

    public function it_can_overwrite_an_value_by_index()
    {
        $this[] = self::VALUE_A;
        $this[0]->shouldReturn(self::VALUE_A);

        $this[0] = self::VALUE_B;
        $this[0]->shouldReturn(self::VALUE_B);
    }

    public function it_can_unset_a_value_by_index()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        unset($this[0]);

        $this[0]->shouldReturn(self::VALUE_B);
        $this->count()->shouldReturn(1);
    }

    public function it_gets_iterator_based_on_internal_array()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->getIterator()->shouldIterateAs([
            self::VALUE_A,
            self::VALUE_B
        ]);

    }
}
