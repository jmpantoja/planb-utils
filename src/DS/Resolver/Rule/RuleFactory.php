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

namespace PlanB\DS\Resolver\Rule;

/**
 * Factory para crear los distintos tipos de Reglas
 */
class RuleFactory
{
    /**
     * Crea un loader
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\Rule\Loader
     */
    public static function loader(callable $callback, string ...$types): Loader
    {
        return Loader::make($callback, ...$types);
    }


    /**
     * Crea una regla
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\Rule\Rule
     */
    public static function rule(callable $callback, string ...$types): Rule
    {
        return Rule::make($callback, ...$types);
    }

    /**
     * Crea un converter
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\Rule\Converter
     */
    public static function converter(callable $callback, string ...$types): Converter
    {
        return Converter::make($callback, ...$types);
    }

    /**
     * Crea un validator
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\Rule\Validator
     */
    public static function validator(callable $callback, string ...$types): Validator
    {
        return Validator::make($callback, ...$types);
    }

    /**
     * Crea un filter
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\Rule\Filter
     */
    public static function filter(callable $callback, string ...$types): Filter
    {
        return Filter::make($callback, ...$types);
    }
}
