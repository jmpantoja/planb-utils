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

use PlanB\DS\Map\AbstractMap;
use PlanB\DS\Resolver\Resolver;

/**
 * Map para objetos Text
 */
class TextMap extends AbstractMap
{
    use TraitTextList;

    /**
     * @param mixed[]                           $input
     *
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS\Map
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): TextMap
    {
        return (new static($resolver))
            ->putAll($input);
    }
}
