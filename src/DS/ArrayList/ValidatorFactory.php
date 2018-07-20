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

namespace PlanB\DS\ArrayList;

use PlanB\DS\ArrayList\Exception\InvalidTypeException;

/**
 * Method Factory para crear el validator que corresponde a un tipo determinado
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class ValidatorFactory
{

    /**
     * Crea validators
     *
     * @param string $type
     *
     * @return \PlanB\DS\ArrayList\Hook
     */
    public static function factory(string $type): Hook
    {
        if (self::isNativeType($type)) {
            return self::getTypeOfHook($type);
        }

        if (self::isClassname($type)) {
            return self::getInstanceOfHook($type);
        }

        throw InvalidTypeException::forType($type);
    }

    /**
     * Indica si $type corresponde con un tipo nativo (array, integer, string, ...)
     *
     * @param string $type
     *
     * @return bool
     */
    private static function isNativeType(string $type): bool
    {
        $function = sprintf('is_%s', strtolower($type));

        return function_exists($function);
    }


    /**
     * Devuelve un Hook configurado para validar que valor sea de un tipo nativo determinado
     *
     * @param string $type
     *
     * @return \PlanB\DS\ArrayList\Hook
     */
    private static function getTypeOfHook(string $type): Hook
    {
        return Hook::fromCallable(function ($value) use ($type) {

            $function = sprintf('is_%s', strtolower($type));

            return call_user_func($function, $value);
        });
    }


    /**
     * Indica si $type corresponde con una nombre de clase o de interfaz
     *
     * @param string $type
     *
     * @return bool
     */
    private static function isClassname(string $type): bool
    {
        return class_exists($type) || interface_exists($type);
    }

    /**
     * Devuelve un Hook configurado para validar que valor es una instancia de una clase, o interfaz determinada
     *
     * @param string $type
     *
     * @return \PlanB\DS\ArrayList\Hook
     */
    private static function getInstanceOfHook(string $type): Hook
    {
        return Hook::fromCallable(function ($value) use ($type) {
            return $value instanceof $type;
        });
    }
}
