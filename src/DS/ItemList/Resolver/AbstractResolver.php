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
 * Resolver Abstracto
 */
abstract class AbstractResolver implements ResolverInterface
{
    /**
     * @var \PlanB\DS\ItemList\KeyValue
     */
    private $pair;

    /**
     * Ejecuta el resolver
     *
     * @param \PlanB\DS\ItemList\KeyValue      $pair
     * @param \PlanB\DS\ItemList\ListInterface $context
     */
    public function execute(KeyValue $pair, ListInterface $context): void
    {
        $this->pair = $pair;
        $value = $pair->getValue();
        $key = $pair->getKey();

        $value = $this->resolve($value, $key, $context);

        if ($pair->isInvalid()) {
            return;
        }

        $pair->setValueIfNotNull($value);
    }

    /**
     * Resuelve una pareja clave/valor
     *
     * @param mixed                            $value
     * @param mixed                            $key
     * @param \PlanB\DS\ItemList\ListInterface $context
     *
     * @return mixed
     */
    abstract public function resolve($value, $key, ListInterface $context);

    /**
     * Marca la pareja clave/valor como ignorada
     *
     * @return void
     */
    public function markAsInvalid(): ResolverInterface
    {
        $this->pair->markAsInvalid();

        return $this;
    }

    /**
     * Modifica la pareja clave/valor
     *
     * @param mixed $key
     *
     * @return void
     */
    public function setKey($key): ResolverInterface
    {
        $this->pair->setKey($key);

        return $this;
    }

    /**
     * Modifica la pareja clave/valor
     *
     * @param mixed $value
     *
     * @return void
     */
    public function setValue($value): ResolverInterface
    {
        $this->pair->setValue($value);

        return $this;
    }

    /**
     * Modifica la pareja clave/valor
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return void
     */
    public function setPair($key, $value): ResolverInterface
    {
        $this->pair->setKey($key);
        $this->pair->setValue($value);

        return $this;
    }
}
