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

namespace PlanB\DS\Vector;

use PlanB\DS\Traits\TraitArray;
use PlanB\DS\Traits\TraitCollection;
use PlanB\DS\Traits\TraitResolver;
use PlanB\DS\Traits\TraitSequence;

/**
 * A Vector is a sequence of values in a contiguous buffer that grows and
 * shrinks automatically. It’s the most efficient sequential structure because
 * a value’s index is a direct mapping to its index in the buffer, and the
 * growth factor isn't bound to a specific multiple or exponent.
 */
abstract class AbstractVector implements \IteratorAggregate, \ArrayAccess, VectorInterface
{
    use TraitCollection;
    use TraitResolver;
    use TraitSequence;
    use TraitArray;



    /**
     * @var \Ds\Vector
     */
    protected $items;

    /**
     * @inheritdoc
     */
    protected function makeInternal(): \DS\Vector
    {
        return new \DS\Vector();
    }

    /**
     * Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Collection
     */
    protected function duplicate(iterable $input = []): VectorInterface
    {
        return static::make($input, $this->resolver);
    }
}
