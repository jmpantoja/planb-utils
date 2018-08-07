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
use PlanB\Utils\Type\TypeAssurance;
use PlanB\Utils\Type\Type;


if (!function_exists('ensure_typename')) {

    /**
     * Assurance para TypeName
     *
     * @param string $classname
     * @return TypeNameAssurance
     */
    function ensure_typename(string $classname): TypeNameAssurance
    {
        return TypeNameAssurance::create($classname);
    }
}

if (!function_exists('ensure_type')) {

    /**
     * Assurance para Type
     *
     * @param $text
     * @return TypeAssurance
     */
    function ensure_type($text): TypeAssurance
    {
        return TypeAssurance::create($text);
    }
}


if (!function_exists('is_typeof')) {

    /**
     * Indica si la variable pasada es de alguno de los tipos indicados
     *
     * @param $variable
     * @param string ...$allowed
     * @return bool
     */
    function is_typeof($variable, string ...$allowed): bool
    {
        return Type::create($variable)->isTypeOf(...$allowed);
    }
}

