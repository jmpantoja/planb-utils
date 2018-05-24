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

namespace PlanB\Type\Collection\Utilities;

use PlanB\Type\Collection\Collection;
use PlanB\Type\Collection\Exception\EmptyArgumentException;

/**
 * * Nos ayuda a crear colecciones en distintos escenarios
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class Creator
{

    /**
     * Crea una colección, a partir de su tipo
     *
     * ```php
     * $collectionOfStrings = Creator::fromType("string");
     * $collectionOfExceptions = Creator::fromType(\Exception::class);
     *
     * ```
     *
     * @param string $type
     *
     * @return \PlanB\Type\Collection\Collection
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
     * @return \PlanB\Type\Collection\Collection
     */
    public static function fromValueType($value): Collection
    {
        $type = is_object($value) ? get_class($value) : gettype($value);

        return new Collection($type);
    }

    /**
     * Crea una colección a partir de un conjunto de valores
     *
     * Se espera que el array de entrada no esté vacio, y que no contenga valores de varios tipos
     *
     * @param mixed[] $input
     *
     * @return \PlanB\Type\Collection\Collection
     */
    public static function fromArray(iterable $input): Collection
    {
        if (empty($input)) {
            throw EmptyArgumentException::emptyInput();
        }

        $collection = null;
        foreach ($input as $key => $value) {
            $collection = $collection ?? static::fromValueType($value);
            $collection->itemSet($key, $value);
        }

        return $collection;
    }
}