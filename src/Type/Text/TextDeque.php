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

/**
 * Deque para objetos Text
 */
class TextDeque extends AbstractDeque
{
    use TraitTextList;

    /**
     * TextDeque named constructor
     *
     * @param mixed[] $input
     *
     * @return \PlanB\Type\Text\TextDeque
     */
    public static function make(iterable $input = []): TextDeque
    {
        return new static($input);
    }
}
