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

use PlanB\DS\Resolver\Resolver;
use PlanB\DS\Set\AbstractSet;

/**
 * Set para objetos Text
 */
class TextSet extends AbstractSet
{
    use TraitTextList;

    /**
     * @param mixed[]                          $input
     *
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS\Set
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): TextSet
    {
        return (new static($resolver))
            ->addAll($input);
    }
}