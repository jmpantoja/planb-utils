<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace PlanB\Type\Text;

use PlanB\DS\Vector\AbstractVector;

/**
 * Lista de elementos tipo Text
 */
class TextVector extends AbstractVector
{

    use TraitTextList;

    /**
     * Named Constructor
     *
     * @param mixed[] $input
     *
     * @return \PlanB\Type\Text\TextVector
     */
    public static function make(iterable $input = []): TextVector
    {
        return new static($input);
    }
}
