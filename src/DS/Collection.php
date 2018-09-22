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

namespace PlanB\DS;

/**
 * Collection is the base interface which covers functionality common to all the
 * data structures in this library. It guarantees that all structures are
 * traversable, countable, and can be converted to json using json_encode().
 */
interface Collection extends \Traversable, \Countable, \JsonSerializable
{
    /**
     * Removes all values from the collection.
     */
    public function clear(): Collection;

    /**
     * Returns the size of the collection.
     *
     * @return int
     */
    public function count(): int;

    /**
     * Returns a shallow copy of the collection.
     *
     * @return \PlanB\DS\Collection a copy of the collection.
     */
    public function copy(): Collection;

    /**
     * Returns whether the collection is empty.
     *
     * This should be equivalent to a count of zero, but is not required.
     * Implementations should define what empty means in their own context.
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Returns an array representation of the collection.
     *
     * The format of the returned array is implementation-dependent.
     * Some implementations may throw an exception if an array representation
     * could not be created.
     *
     * @return mixed[]
     */
    public function toArray(): array;
}
