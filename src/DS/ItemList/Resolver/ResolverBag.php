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
use PlanB\DS\ItemList\KeyValue;
use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\ItemList\Resolver\Exception\InvalidResolverException;

/**
 * Cola con los resolvers
 */
class ResolverBag implements \Countable
{

    /**
     * @var \SplPriorityQueue
     */
    private $queue;

    /**
     * @var bool
     */
    private $ignoreInvalidItems = false;

    /**
     * @var bool
     */
    private $locked = false;

    /**
     * ResolverBag constructor.
     */
    public function __construct()
    {
        $this->queue = new \SplPriorityQueue();
    }

    /**
     * Count elements of an object
     *
     * @return int
     */
    public function count(): int
    {
        return $this->queue->count();
    }

    /**
     * Indica que los valores invalidos deben ser ignorados sin lanzar una excepción
     *
     * @return \PlanB\DS\ItemList\Resolver\ResolverBag
     */
    public function ignoreOnInvalid(): self
    {
        $this->ignoreInvalidItems = true;

        return $this;
    }

    /**
     * Indica si ya no se pueden añadir nuevos resolvers
     *
     * @return bool
     */
    public function isLocked(): bool
    {
        return $this->locked;
    }

    /**
     * Bloque la lista de resolvers para que no se puedan añadir más
     *
     * @return \PlanB\DS\ItemList\Resolver\ResolverBag
     */
    public function lockResolvers(): ResolverBag
    {
        $this->locked = true;

        return $this;
    }


    /**
     * Añade un nuevo resolver
     *
     * @param callable|\PlanB\DS\ItemList\Resolver\ResolverInterface $resolver
     * @param int                                                    $priority
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function addResolver($resolver, int $priority = 0): self
    {

        if ($this->isLocked()) {
            throw  ReconfigureFullyListException::create();
        }

        if ($resolver instanceof \Closure) {
            $resolver = CallableResolver::fromCallable($resolver);
        }

        if ($resolver instanceof ResolverInterface) {
            $this->queue->insert($resolver, $priority);

            return $this;
        }

        throw InvalidResolverException::create($resolver);
    }


    /**
     * Ejecuta todos los resolvers
     *
     * @param \PlanB\DS\ItemList\KeyValue      $pair
     *
     * @param \PlanB\DS\ItemList\ListInterface $context
     *
     * @return \PlanB\DS\ItemList\KeyValue
     */
    public function resolve(KeyValue $pair, ListInterface $context): KeyValue
    {
        $this->lockResolvers();

        $resolvers = clone $this->queue;
        while (!$pair->isInvalid() && ($resolver = $resolvers->current())) {
            $this->doResolve($resolver, $pair, $context);

            $resolvers->next();
        };

        return $pair;
    }

    /**
     * Resuelve un caso particular
     *
     * @param \PlanB\DS\ItemList\Resolver\ResolverInterface $resolver
     * @param \PlanB\DS\ItemList\KeyValue                   $pair
     * @param \PlanB\DS\ItemList\ListInterface              $context
     */
    private function doResolve(ResolverInterface $resolver, KeyValue $pair, ListInterface $context): void
    {
        $resolver->execute($pair, $context);

        if ($this->shouldThrowException($pair)) {
            throw InvalidItemException::create($pair);
        }
    }

    /**
     * Indica si se debe lanzar o no la excepción
     *
     * @param \PlanB\DS\ItemList\KeyValue $pair
     *
     * @return \PlanB\DS\ItemList\Resolver\booln
     */
    private function shouldThrowException(KeyValue $pair): bool
    {
        $isInvalid = $pair->isInvalid();
        $isNotIgnored = !$this->ignoreInvalidItems;

        return $isInvalid && $isNotIgnored;
    }
}
