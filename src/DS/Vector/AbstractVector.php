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
     * @inheritdoc
     */
    protected function makeInternal(): \DS\Collection
    {
        return new \DS\Vector();
    }
}
