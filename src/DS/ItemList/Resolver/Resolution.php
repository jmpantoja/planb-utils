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

use PlanB\DS\ItemList\Exception\InvalidItemException;
use PlanB\DS\ItemList\Exception\ReconfigureFullyListException;
use PlanB\DS\ItemList\Item;
use PlanB\DS\ItemList\ListInterface;

/**
 * Esta clase manipula un Item antes de ser agregado a la lista
 */
class Resolution
{
    /**
     * @var \PlanB\DS\ItemList\ListInterface
     */
    private $context;

    /**
     * @var \SplPriorityQueue
     */
    private $resolvers;

    /**
     * @var bool
     */
    private $silentExceptions;

    /**
     * @var bool
     */
    private $locked = false;


    /**
     * Resolver constructor.
     *
     * @param \PlanB\DS\ItemList\ListInterface $context
     */
    protected function __construct(ListInterface $context)
    {
        $this->context = $context;
        $this->resolvers = new \SplPriorityQueue();
    }

    /**
     * Crea una nueva instancia
     *
     * @param \PlanB\DS\ItemList\ListInterface $context
     *
     * @return \PlanB\DS\ItemList\Resolver\Resolution
     */
    public static function create(ListInterface $context): self
    {
        return new static($context);
    }

    /**
     * Resuelve un Item antes de ser añadido
     *
     * @param \PlanB\DS\ItemList\Item $item
     *
     * @return bool
     */
    public function resolve(Item $item): bool
    {
        $this->locked = true;

        $resolvers = clone $this->resolvers;

        $valid = true;
        while ($valid && $resolver = $resolvers->current()) {
            $valid = $this->doResolve($resolver, $item);
            $resolvers->next();
        }

        if (false === $valid) {
            $this->throwExceptionIfAppropriate($item);
        }

        return $valid;
    }

    /**
     * Ejecuta un resolver
     *
     * @param \PlanB\DS\ItemList\Resolver\Resolvable $resolver
     * @param \PlanB\DS\ItemList\Item                $item
     *
     * @return bool
     */
    private function doResolve(Resolvable $resolver, Item $item): bool
    {
        try {
            $valid = call_user_func($resolver, $item, $this->context);
        } catch (\Throwable $exception) {
            $this->throwExceptionIfAppropriate($item, $exception);
        }


        return $valid;
    }

    /**
     * Lanza la excepción, si procede
     *
     * @param \PlanB\DS\ItemList\Item $item
     * @param \Throwable|null         $previous
     */
    private function throwExceptionIfAppropriate(Item $item, ?\Throwable $previous = null): void
    {
        if ($this->silentExceptions) {
            return;
        }
        throw InvalidItemException::create($item, $previous);
    }

    /**
     * Añade un resolver
     *
     * @param \PlanB\DS\ItemList\Resolver\Resolvable $resolver
     * @param int                                    $order
     */
    public function add(Resolvable $resolver, int $order = 1): void
    {
        $this->ensureIsNotLocked();

        $priority = PHP_INT_MAX - $order;
        $this->resolvers->insert($resolver, $priority);
    }


    /**
     * Silencia las excepciones
     *
     * @return \PlanB\DS\ItemList\Resolver\Resolution
     */
    public function silentExceptions(): self
    {
        $this->ensureIsNotLocked();

        $this->silentExceptions = true;

        return $this;
    }

    /**
     * Lanza una exception si se trata de modificar la configuración de una lista bloqueda
     *
     * @return \PlanB\DS\ItemList\Resolver\Resolution
     */
    private function ensureIsNotLocked(): self
    {

        if ($this->locked) {
            throw ReconfigureFullyListException::create();
        }

        return $this;
    }

    /**
     * Devuelve el número total de resolvers
     *
     * @return int
     */
    public function count(): int
    {
        return $this->resolvers->count();
    }
}
