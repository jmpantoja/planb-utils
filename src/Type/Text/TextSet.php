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

use PlanB\DS\Set\AbstractSet;

/**
 * Set para objetos Text
 */
class TextSet extends AbstractSet
{
    use TraitTextList;

    /**
     * Named Constructor
     *
     * @param mixed[] $input
     *
     * @return \PlanB\Type\Text\TextSet
     */
    public static function make(iterable $input = []): TextSet
    {
        return new static($input);
    }
}
