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

use \PlanB\Utils\Hydrator\GetSetHydrator;

if (!function_exists('array_to_object')) {

    /**
     * Convierte un array en un objeto
     *
     * @param mixed[] $values
     * @param mixed $classNameOrObject
     * @return object
     */
    function array_to_object(iterable $values, $classNameOrObject): object
    {
        return GetSetHydrator::create()->hydrate($classNameOrObject, $values);
    }
}
if (!function_exists('object_to_array')) {

    /**
     * Convierte un objeto en un array
     *
     * @param object $object
     * @param null|string $snakeCaseSeparator
     * @return array
     */
    function object_to_array(object $object, string $snakeCaseSeparator = '_'): array
    {
        return GetSetHydrator::create()->extract($object, $snakeCaseSeparator);
    }
}
