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

    function array_to_object(iterable $values, string $className): object
    {
        return GetSetHydrator::create()->hydrate($className, $values);
    }
}
if (!function_exists('object_to_array')) {

    function object_to_array(object $object, ?string $snakeCaseSeparator = null): array
    {
        return GetSetHydrator::create()->extract($object, $snakeCaseSeparator);
    }
}
