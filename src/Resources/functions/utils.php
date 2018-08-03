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

if (!function_exists('at_least_one')) {

    /**
     * Comprueba que al menos  uno de los elementos cumple una condición
     *
     * @param iterable $values
     * @param callable $callback
     * @return bool
     */
    function at_least_one(iterable $values, callable $callback): bool
    {
        foreach ($values as $key => $value) {
            $found = call_user_func($callback, $value, $key, $values);
            if (true === $found) {
                return true;
            }
        }
        return false;
    }
}


