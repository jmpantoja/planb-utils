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

use PlanB\DS\Deque\AbstractDeque;
use PlanB\DS\Resolver\Resolver;

/**
 * Deque para objetos Text
 */
class TextDeque extends AbstractDeque
{
    use TraitTextList;

    /**
     * @param mixed[]                           $input
     *
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS\Deque
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): TextDeque
    {
        return (new static($resolver))
            ->pushAll($input);
    }
}
