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

use PlanB\Utils\Type\Type;
use PlanB\Utils\TypeName\TypeName;
use PlanB\ValueObject\Text\Text;
use PlanB\ValueObject\Text\TextList;

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
        $typeName = TypeName::create($type);

        return static::fromTypeName($typeName);
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
        $typeName = Type::create($value)->getTypeName();

        return static::fromTypeName($typeName);
    }

    /**
     * Crea una lista a partir de un objeto TypeName
     *
     * @param \PlanB\Utils\TypeName\TypeName $typeName
     *
     * @return \PlanB\DS\TypedList\TypedListInterface
     */
    public static function fromTypeName(TypeName $typeName): TypedListInterface
    {
        if ($typeName->isClassOf(Text::class)) {
            return TextList::create();
        }

        return TypedList::create($typeName->stringify());
    }
}
