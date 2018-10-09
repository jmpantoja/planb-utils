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

namespace PlanB\DS\Resolver;

use PlanB\Type\DataType\DataType;

/**
 * Interfaz para Resolver
 */
interface ResolverInterface
{
    /**
     * Indica si aun no se han añadido reglas
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Asigna un tipo a este resolver
     *
     * @param string $type
     *
     * @return \PlanB\DS\Resolver\ResolverInterface
     */
    public function type(string $type): ResolverInterface;

    /**
     * Devuelve el tipo de este resolver
     *
     * @return null|\PlanB\Type\DataType\DataType
     */
    public function getType(): ?DataType;

    /**
     * Añade un nuevo loader
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\ResolverInterface
     */
    public function loader(callable $callback, string ...$types): ResolverInterface;

    /**
     * Añade una nueva regla
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\ResolverInterface
     */
    public function rule(callable $callback, string ...$types): ResolverInterface;

    /**
     * Añade un nuevo converter
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\ResolverInterface
     */
    public function converter(callable $callback, string ...$types): ResolverInterface;


    /**
     * Añade un nuevo converter
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\ResolverInterface
     */
    public function validator(callable $callback, string ...$types): ResolverInterface;

    /**
     * Añade un nuevo filter
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\ResolverInterface
     */
    public function filter(callable $callback, string ...$types): ResolverInterface;

    /**
     * Resuelve un valor
     *
     * @param callable $callback
     * @param mixed    $value
     *
     * @param mixed    $key
     *
     * @throws \Throwable
     */
    public function value(callable $callback, $value, $key = null): void;

    /**
     * Resuelve un conjunto de valores
     *
     * @param callable $callback
     * @param mixed[]  $values
     *
     * @throws \Throwable
     */
    public function values(callable $callback, iterable $values): void;
}
