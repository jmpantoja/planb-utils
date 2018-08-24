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

namespace PlanB\DS\TypedList;

use PlanB\Type\DataType\DataType;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextList;
use PlanB\Type\Value\Value;

/**
 * Factory para crear Listas con Tipo
 */
class TypedListFactory
{
    /**
     * Crea una lista a partir de un nombre de tipo
     *
     * @param string $type
     *
     * @return \PlanB\DS\TypedList\TypedListInterface
     */
    public static function fromType(string $type): TypedListInterface
    {
        $typeName = DataType::create($type);

        return static::fromTypeObject($typeName);
    }

    /**
     * Crea una lista a partir de un valor
     *
     * @param mixed $value
     *
     * @return \PlanB\DS\TypedList\TypedListInterface
     */
    public static function fromValue($value): TypedListInterface
    {
        $typeName = Value::create($value)->getType();

        return static::fromTypeObject($typeName);
    }

    /**
     * Crea una lista a partir de un objeto DataType
     *
     * @param \PlanB\Type\DataType\DataType $typeName
     *
     * @return \PlanB\DS\TypedList\TypedListInterface
     */
    public static function fromTypeObject(DataType $typeName): TypedListInterface
    {
        if ($typeName->isClassOf(Text::class)) {
            return TextList::create();
        }

        return TypedList::create($typeName->stringify());
    }
}
