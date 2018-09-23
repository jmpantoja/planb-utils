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

namespace PlanB\Type\DataType;

use MabeEnum\Enum;

/**
 * Nombres de tipos nativos
 */
final class Type extends Enum
{
    public const ARRAY = 'array';
    public const BOOLEAN = 'boolean';
    public const CALLABLE = 'callable';
    public const COUNTABLE = 'countable';
    public const DOUBLE = 'double';
    public const INTEGER = 'integer';
    public const ITERABLE = 'iterable';
    public const NULL = 'null';
    public const NUMERIC = 'numeric';
    public const OBJECT = 'object';
    public const RESOURCE = 'resource';
    public const SCALAR = 'scalar';
    public const STRING = 'string';
    public const STRINGIFABLE = 'stringifable';
}
