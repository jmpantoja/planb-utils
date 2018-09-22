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


trait TraitNoArray
{

    public function it_throws_an_exception_when_determine_if_an_index_exists()
    {
        $this->shouldThrow(\Error::class)->duringOffsetExists(0);
    }


    public function it_throws_an_exception_when_retrieve_an_value_by_index()
    {
        $this[] = self::VALUE_A;
        $this->shouldThrow(\Error::class)->duringOffsetGet(0);
    }

    public function it_throws_an_exception_when_overwrite_an_value_by_index()
    {
        $this->shouldNotThrow(\Error::class)->duringOffsetSet(null, self::VALUE_A);
        $this->shouldThrow(\Error::class)->duringOffsetSet('key', self::VALUE_A);
    }

    public function it_throws_an_exception_when_unset_a_value()
    {
        $this[] = self::VALUE_A;
        $this->shouldThrow(\Error::class)->duringOffsetUnSet(0);
    }

}
