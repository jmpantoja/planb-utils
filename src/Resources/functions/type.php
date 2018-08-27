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

use PlanB\Type\DataType\DataTypeAssurance;
use PlanB\Type\Value\ValueAssurance;
use PlanB\Type\Value\Value;


if (!function_exists('ensure_type')) {

    /**
     * Assurance para DataType
     *
     * @param string $classname
     * @return DataTypeAssurance
     */
    function ensure_type(string $classname): DataTypeAssurance
    {
        return DataTypeAssurance::create($classname);
    }
}

if (!function_exists('ensure_value')) {

    /**
     * Assurance para Value
     *
     * @param $text
     * @return ValueAssurance
     */
    function ensure_value($text): ValueAssurance
    {
        return ValueAssurance::create($text);
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
        return Value::create($variable)->isTypeOf(...$allowed);
    }
}

