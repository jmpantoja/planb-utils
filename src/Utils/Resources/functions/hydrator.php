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

if (!function_exists('hydrate')) {

    function hydrate(string $className, iterable $values): object
    {
        return GetSetHydrator::create()->hydrate($className, $values);
    }

}

