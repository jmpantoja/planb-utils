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


trait TraitCollection
{
    public function it_is_empty_when_initialize()
    {
        $this->isEmpty()->shouldReturn(true);
    }

    public function it_is_not_empty_when_add_a_value()
    {
        $this[] = self::VALUE_A;
        $this->isEmpty()->shouldReturn(false);
    }


    public function it_count_zero_when_initialize()
    {
        $this->count()->shouldReturn(0);
    }

    public function it_count_one_when_add_a_value()
    {
        $this[] = self::VALUE_A;
        $this->count()->shouldReturn(1);
    }

    public function it_count_two_when_add_two_values()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->count()->shouldReturn(2);
    }


    public function it_has_same_elements_when_cloned()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $copy = $this->copy();

        $copy->shouldIterateAs([
            self::VALUE_A,
            self::VALUE_B
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

}
