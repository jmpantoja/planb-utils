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


trait TraitConverts
{

    public function it_retrieve_internal_array_when_json_serialize()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->jsonSerialize()->shouldReturn([
            self::VALUE_A,
            self::VALUE_B
        ]);
    }

    public function it_retrieve_internal_array_when_converts_to_array()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->toArray()->shouldReturn([
            self::VALUE_A,
            self::VALUE_B
        ]);
    }


    public function it_retrieve_internal_array_when_debug_info()
    {
        $this[] = self::VALUE_A;
        $this[] = self::VALUE_B;

        $this->__debugInfo()->shouldReturn([
            self::VALUE_A,
            self::VALUE_B
        ]);
    }
}
