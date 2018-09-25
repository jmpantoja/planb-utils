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

namespace PlanB\Type\Text;

use PlanB\DS\PriorityQueue\AbstractPriorityQueue;
use PlanB\DS\Resolver\Resolver;

/**
 * PriorityQueue para objetos Text
 */
class TextPriorityQueue extends AbstractPriorityQueue
{
    use TraitTextList;


    /**
     * Named Constructor
     *
     * @param mixed[]                          $input
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     *
     * @return \PlanB\Type\Text\TextPriorityQueue
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): TextPriorityQueue
    {
        return (new static($resolver))
            ->pushAll($input);
    }
}
