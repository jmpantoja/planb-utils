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

namespace PlanB\DS1;

/**
 * Describes the behaviour of values arranged in a single, linear dimension.
 * Some languages refer to this as a "List". It’s similar to an array that uses
 * incremental integer keys, with the exception of a few characteristics:
 *
 *  - Values will always be indexed as [0, 1, 2, …, size - 1].
 *  - Only allowed to access values by index in the range [0, size - 1].
 */
interface Sequence extends Collection
{
    /**
     * Updates every value in the sequence by applying a callback, using the
     * return value as the new value.
     *
     * @param callable $callback Accepts the value, returns the new value.
     *
     * @return \PlanB\DS1\Sequence
     */
    public function each(callable $callback): Sequence;


    /**
     * Determines whether the sequence contains all of zero or more values.
     *
     * @param mixed ...$values
     *
     * @return bool true if at least one value was provided and the sequence
     *              contains all given values, false otherwise.
     */
    public function contains(...$values): bool;

    /**
     * Returns a new sequence containing only the values for which a callback
     * returns true. A boolean test will be used if a callback is not provided.
     *
     * @param callable|null $callback Accepts a value, returns a boolean result:
     *                                true : include the value,
     *                                false: skip the value.
     *
     * @return \PlanB\DS1\Sequence
     */
    public function filter(?callable $callback = null): Sequence;

    /**
     * Returns the index of a given value, or null if it could not be found.
     *
     * @param mixed $value
     *
     * @return int|null
     */
    public function find($value): ?int;

    /**
     * Returns the all the index of a given value, or null if it could not be found.
     *
     * @param mixed $value
     *
     * @return mixed[]|null
     */
    public function findAll($value): ?array;

    /**
     * Returns the first value in the sequence.
     *
     * @return mixed
     *
     * @throws \UnderflowException if the sequence is empty.
     */
    public function first();

    /**
     * Returns the value at a given index (position) in the sequence.
     *
     * @param int $index
     *
     * @return mixed
     *
     * @throws \OutOfRangeException if the index is not in the range [0, size-1]
     */
    public function get(int $index);

    /**
     * Inserts zero or more values at a given index.
     *
     * Each value after the index will be moved one position to the right.
     * Values may be inserted at an index equal to the size of the sequence.
     *
     * @param int   $index
     * @param mixed ...$values
     *
     * @return \PlanB\DS1\Sequence
     *
     * @throws \OutOfRangeException if the index is not in the range [0, n]
     */
    public function insert(int $index, ...$values): Sequence;


    /**
     * Returns the last value in the sequence.
     *
     * @return mixed
     *
     * @throws \UnderflowException if the sequence is empty.
     */
    public function last();

    /**
     * Returns a new sequence using the results of applying a callback to each
     * value.
     *
     * @param callable $callback
     *
     * @return \PlanB\DS1\Sequence
     */
    public function map(callable $callback): Sequence;

    /**
     * Returns the result of adding all given values to the sequence.
     *
     * @param mixed[]|\Traversable $values
     *
     * @return \PlanB\DS1\Sequence
     */
    public function merge(iterable $values): Sequence;

    /**
     * Removes the last value in the sequence, and returns it.
     *
     * @return mixed what was the last value in the sequence.
     *
     * @throws \UnderflowException if the sequence is empty.
     */
    public function pop();

    /**
     * Adds zero or more values to the end of the sequence.
     *
     * @param mixed ...$values
     *
     * @return \PlanB\DS1\Sequence
     */
    public function push(...$values): Sequence;

    /**
     * Iteratively reduces the sequence to a single value using a callback.
     *
     * @param callable   $callback Accepts the carry and current value, and
     *                             returns an updated carry value.
     *
     * @param mixed|null $initial  Optional initial carry value.
     *
     * @return mixed The carry value of the final iteration, or the initial
     *               value if the sequence was empty.
     */
    public function reduce(callable $callback, $initial = null);

    /**
     * Removes and returns the value at a given index in the sequence.
     *
     * @param int $index this index to remove.
     *
     * @return mixed the removed value.
     *
     * @throws \OutOfRangeException if the index is not in the range [0, size-1]
     */
    public function remove(int $index);

    /**
     * Reverses the sequence in-place.
     */
    public function reverse(): Sequence;

    /**
     * Returns a reversed copy of the sequence.
     *
     * @return \PlanB\DS1\Sequence
     */
    public function reversed(): Sequence;

    /**
     * Rotates the sequence by a given number of rotations, which is equivalent
     * to successive calls to 'shift' and 'push' if the number of rotations is
     * positive, or 'pop' and 'unshift' if negative.
     *
     * @param int $rotations The number of rotations (can be negative).
     *
     * @return \PlanB\DS1\Sequence
     */
    public function rotate(int $rotations): Sequence;

    /**
     * Replaces the value at a given index in the sequence with a new value.
     *
     * @param int   $index
     * @param mixed $value
     *
     * @return \PlanB\DS1\Sequence
     *
     * @throws \OutOfRangeException if the index is not in the range [0, size-1]
     */
    public function set(int $index, $value): Sequence;

    /**
     * Removes and returns the first value in the sequence.
     *
     * @return mixed what was the first value in the sequence.
     *
     * @throws \UnderflowException if the sequence was empty.
     */
    public function shift();

    /**
     * Returns a sub-sequence of a given length starting at a specified index.
     *
     * @param int $index  If the index is positive, the sequence will start
     *                    at that index in the sequence. If index is
     *                    negative, the sequence will start that far from
     *                    the end.
     *
     * @param int $length If a length is given and is positive, the resulting
     *                    sequence will have up to that many values in it.
     *                    If the length results in an overflow, only values
     *                    up to the end of the sequence will be included.
     *
     *                    If a length is given and is negative, the sequence
     *                    will stop that many values from the end.
     *
     *                    If a length is not provided, the resulting sequence
     *                    will contain all values between the index and the
     *                    end of the sequence.
     *
     * @return \PlanB\DS1\Sequence
     */
    public function slice(int $index, ?int $length = null): Sequence;

    /**
     * Sorts the sequence in-place, based on an optional callable comparator.
     *
     * @param callable|null $comparator Accepts two values to be compared.
     *                                  Should return the result of a <=> b.
     *
     * @return \PlanB\DS1\Sequence
     */
    public function sort(?callable $comparator = null): Sequence;

    /**
     * Returns a sorted copy of the sequence, based on an optional callable
     * comparator. Natural ordering will be used if a comparator is not given.
     *
     * @param callable|null $comparator Accepts two values to be compared.
     *                                  Should return the result of a <=> b.
     *
     * @return \PlanB\DS1\Sequence
     */
    public function sorted(?callable $comparator = null): Sequence;


    /**
     * Adds zero or more values to the front of the sequence.
     *
     * @param mixed ...$values
     *
     * @return \PlanB\DS1\Sequence
     */
    public function unshift(...$values): Sequence;
}
