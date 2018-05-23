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

namespace PlanB\Type;

/**
 * * Nos ayuda a crear colecciones en distintos escenarios
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class CollectionCreator
{

    /**
     * Crea una colección, a partir de su tipo
     *
     * @param string $type
     *
     * @return \PlanB\Type\Collection
     */
    public static function fromType(string $type): Collection
    {
        return new Collection($type);
    }

    /**
     * Crea una colección, del mismo tipo de un valor dado
     *
     * @param mixed $value
     *
     * @return \PlanB\Type\Collection
     */
    public static function fromValueType($value): Collection
    {
        $type = is_object($value) ? get_class($value) : gettype($value);

        return new Collection($type);
    }
}
