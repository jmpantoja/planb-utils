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

namespace PlanB\DS1\Resolver\Rule;

use PlanB\Type\Value\Value;

/**
 * Crea un validator que comprueba que un valor sea del tipo esperado
 */
class TypeValidator
{
    /**
     * TypeAssertion named constructor.
     *
     * @param string $type
     *
     * @return \PlanB\DS1\Resolver\Rule\Validator
     */
    public static function make(string $type): Validator
    {
        return Validator::make(function ($input) use ($type) {
            return Value::create($input)->isTypeOf($type);
        });
    }
}
