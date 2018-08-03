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

namespace PlanB\DS\ItemList\Resolver;

use PlanB\DS\ItemList\KeyValue;
use PlanB\DS\ItemList\ListInterface;

/**
 * Interfaz para resolvers
 */
interface ResolverInterface
{
    /**
     * Ejecuta el resolver
     *
     * @param \PlanB\DS\ItemList\KeyValue      $pair
     * @param \PlanB\DS\ItemList\ListInterface $context
     */
    public function execute(KeyValue $pair, ListInterface $context): void;

    /**
     * Resuelve una pareja clave valor
     *
     * @param mixed                            $value
     * @param mixed                            $key
     * @param \PlanB\DS\ItemList\ListInterface $context
     *
     * @return mixed
     */
    public function resolve($value, $key, ListInterface $context);

    /**
     * Marca la pareja clave/valor como ignorada
     *
     * @return void
     */
    public function markAsInvalid(): ResolverInterface;

    /**
     * Modifica la pareja clave/valor
     *
     * @param mixed $key
     *
     * @return void
     */
    public function setKey($key): ResolverInterface;

    /**
     * Modifica la pareja clave/valor
     *
     * @param mixed $value
     *
     * @return void
     */
    public function setValue($value): ResolverInterface;

    /**
     * Modifica la pareja clave/valor
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return void
     */
    public function setPair($key, $value): ResolverInterface;
}
