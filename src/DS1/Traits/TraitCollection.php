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

namespace PlanB\DS1\Traits;

use PlanB\DS1\Collection;

/**
 * Common to structures that implement the base collection interface.
 */
trait TraitCollection
{
    /**
     * Removes all values from the collection.
     *
     * @return  \PlanB\DS1\Collection
     */
    public function clear(): Collection
    {
        $this->items->clear();

        return $this;
    }


    /**
     * Returns whether the collection is empty.
     *
     * This should be equivalent to a count of zero, but is not required.
     * Implementations should define what empty means in their own context.
     *
     * @return bool whether the collection is empty.
     */
    public function isEmpty(): bool
    {
        return 0 === count($this->items);
    }

    /**
     * Returns the size of the collection.
     *
     * @return int
     */
    public function count(): int
    {
        return $this->items->count();
    }

    /**
     * Returns a representation that can be natively converted to JSON, which is
     * called when invoking json_encode.
     *
     * @return mixed[]
     *
     * @see JsonSerializable
     */
    public function jsonSerialize(): array
    {
        return $this->items->toArray();
    }

    /**
     * Creates a shallow copy of the collection.
     *
     * @return \PlanB\DS1\Collection a shallow copy of the collection.
     */
    public function copy(): Collection
    {
        return new self($this->items);
    }

    /**
     * Returns an array representation of the collection.
     *
     * The format of the returned array is implementation-dependent. Some
     * implementations may throw an exception if an array representation
     * could not be created (for example when object are used as keys).
     *
     * @return mixed[]
     */
    public function toArray(): array
    {
        return $this->items->toArray();
    }

    /**
     * Invoked when calling var_dump.
     *
     * @return mixed[]
     */
    public function __debugInfo(): array
    {
        return $this->items->toArray();
    }
}
