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

use PlanB\Utils\TypeName\TypeNameAssurance;
use PlanB\Utils\Type\Type;

if (!function_exists('ensure_typename')) {

    function ensure_typename(string $classname): TypeNameAssurance
    {
        return TypeNameAssurance::create($classname);
    }
}

if (!function_exists('is_typeof')) {

    function is_typeof($variable, string ...$allowed): bool
    {
        return Type::create($variable)->isTypeOf(...$allowed);
    }
}

