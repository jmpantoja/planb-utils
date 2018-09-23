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

namespace PlanB\DS\Traits;

use PlanB\DS\Sequence;

/**
 * Métodos asociados a la interfaz Sequence
 */
trait TraitSequence
{
    /**
     * @var \DS\Sequence
     */
    protected $items;


    /**
     * Updates every value in the sequence by applying a callback, using the
     * return value as the new value.
     *
     * @param callable $callback Accepts the value, returns the new value.
     *
     * @return \PlanB\DS\Sequence
     */
    public function apply(callable $callback): Sequence
    {
        $this->items->apply($callback);

        return $this;
    }

    /**
     * Determines whether the sequence contains all of zero or more values.
     *
     * @param mixed ...$values
     *
     * @return bool true if at least one value was provided and the sequence
     *              contains all given values, false otherwise.
     */
    public function contains(...$values): bool
    {
        return $this->items->contains(...$values);
    }

    /**
     * Returns a new sequence containing only the values for which a callback
     * returns true. A boolean test will be used if a callback is not provided.
     *
     * @param callable|null $callback Accepts a value, returns a boolean result:
     *                                true : include the value,
     *                                false: skip the value.
     *
     * @return \PlanB\DS\Sequence
     */
    public function filter(?callable $callback = null): Sequence
    {
        if (is_null($callback)) {
            return $this->duplicate($this->items->filter());
        }

        return $this->duplicate($this->items->filter($callback));
    }

    /**
     * Returns the index of a given value, or null if it could not be found.
     *
     * @param mixed $value
     *
     * @return int|null
     */
    public function find($value): ?int
    {
        $founded = $this->items->find($value);

        if (false === $founded) {
            return null;
        }

        return $founded;
    }

    /**
     * Returns the all the index of a given value, or null if it could not be found.
     *
     * @param mixed $value
     *
     * @return mixed[]|null
     */
    public function findAll($value): ?array
    {
        $founded = array_keys($this->items->toArray(), $value, true);

        if (0 === count($founded)) {
            return null;
        }

        return $founded;
    }

    /**
     * Returns the first value in the sequence.
     *
     * @return mixed
     *
     * @throws \UnderflowException if the sequence is empty.
     */
    public function first()
    {
        return $this->items->first();
    }

    /**
     * Returns the value at a given index (position) in the sequence.
     *
     * @param int $index
     *
     * @return mixed
     *
     * @throws \OutOfRangeException if the index is not in the range [0, size-1]
     */
    public function get(int $index)
    {
        return $this->items->get($index);
    }

    /**
     * Inserts zero or more values at a given index.
     *
     * Each value after the index will be moved one position to the right.
     * Values may be inserted at an index equal to the size of the sequence.
     *
     * @param int   $index
     * @param mixed ...$values
     *
     * @return \PlanB\DS\Sequence
     *
     * @throws \OutOfRangeException if the index is not in the range [0, n]
     */
    public function insert(int $index, ...$values): Sequence
    {

        $this->hook(function (...$values) use ($index): void {
            $this->items->insert($index, ...$values);
        }, ...$values);

        return $this;
    }


    /**
     * Returns the last value in the sequence.
     *
     * @return mixed
     *
     * @throws \UnderflowException if the sequence is empty.
     */
    public function last()
    {
        return $this->items->last();
    }

    /**
     * Returns a new sequence using the results of applying a callback to each
     * value.
     *
     * @param callable $callback
     *
     * @return \PlanB\DS\Sequence
     */
    public function map(callable $callback): Sequence
    {
        $items = $this->items->map($callback);

        return $this->duplicate($items);
    }

    /**
     * Returns the result of adding all given values to the sequence.
     *
     * @param mixed[]|\Traversable $values
     *
     * @return \PlanB\DS\Sequence
     */
    public function merge(iterable $values): Sequence
    {
        $items = $this->items->merge($values);

        return $this->duplicate($items);
    }

    /**
     * Removes the last value in the sequence, and returns it.
     *
     * @return mixed what was the last value in the sequence.
     *
     * @throws \UnderflowException if the sequence is empty.
     */
    public function pop()
    {
        return $this->items->pop();
    }

    /**
     * Pushes all values of either an array or traversable object.
     *
     * @param mixed[] $values
     *
     * @return \PlanB\DS\Sequence
     */
    public function pushAll(iterable $values): Sequence
    {
        foreach ($values as $value) {
            $this[] = $value;
        }

        return $this;
    }

    /**
     * Adds zero or more values to the end of the sequence.
     *
     * @param mixed ...$values
     *
     * @return \PlanB\DS\Sequence
     */
    public function push(...$values): Sequence
    {
        return $this->pushAll($values);
    }

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
    public function reduce(callable $callback, $initial = null)
    {
        return $this->items->reduce($callback, $initial);
    }

    /**
     * Removes and returns the value at a given index in the sequence.
     *
     * @param int $index this index to remove.
     *
     * @return mixed the removed value.
     *
     * @throws \OutOfRangeException if the index is not in the range [0, size-1]
     */
    public function remove(int $index)
    {
        return $this->items->remove($index);
    }

    /**
     * Reverses the sequence in-place.
     *
     * @return  \PlanB\DS\Sequence
     */
    public function reverse(): Sequence
    {
        $this->items->reverse();

        return $this;
    }

    /**
     * Returns a reversed copy of the sequence.
     *
     * @return \PlanB\DS\Sequence
     */
    public function reversed(): Sequence
    {
        $items = $this->items->reversed();

        return $this->duplicate($items);
    }

    /**
     * Rotates the sequence by a given number of rotations, which is equivalent
     * to successive calls to 'shift' and 'push' if the number of rotations is
     * positive, or 'pop' and 'unshift' if negative.
     *
     * @param int $rotations The number of rotations (can be negative).
     *
     * @return \PlanB\DS\Sequence
     */
    public function rotate(int $rotations): Sequence
    {
        $this->items->rotate($rotations);

        return $this;
    }

    /**
     * Replaces the value at a given index in the sequence with a new value.
     *
     * @param int   $index
     * @param mixed $value
     *
     * @return \PlanB\DS\Sequence
     *
     * @throws \OutOfRangeException if the index is not in the range [0, size-1]
     */
    public function set(int $index, $value): Sequence
    {
        $this->offsetSet($index, $value);

        return $this;
    }

    /**
     * Removes and returns the first value in the sequence.
     *
     * @return mixed what was the first value in the sequence.
     *
     * @throws \UnderflowException if the sequence was empty.
     */
    public function shift()
    {
        return $this->items->shift();
    }

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
     * @return \PlanB\DS\Sequence
     */
    public function slice(int $index, ?int $length = null): Sequence
    {
        $items = $length ?
            $this->items->slice($index, $length) :
            $this->items->slice($index);

        return $this->duplicate($items);
    }

    /**
     * Sorts the sequence in-place, based on an optional callable comparator.
     *
     * @param callable|null $comparator Accepts two values to be compared.
     *                                  Should return the result of a <=> b.
     *
     * @return \PlanB\DS\Sequence
     */
    public function sort(?callable $comparator = null): Sequence
    {
        $comparator ?
            $this->items->sort($comparator) :
            $this->items->sort();

        return $this;
    }

    /**
     * Returns a sorted copy of the sequence, based on an optional callable
     * comparator. Natural ordering will be used if a comparator is not given.
     *
     * @param callable|null $comparator Accepts two values to be compared.
     *                                  Should return the result of a <=> b.
     *
     * @return \PlanB\DS\Sequence
     */
    public function sorted(?callable $comparator = null): Sequence
    {

        $items = $comparator ?
            $this->items->sorted($comparator) :
            $this->items->sorted();

        return $this->duplicate($items);
    }

    /**
     * Adds zero or more values to the front of the sequence.
     *
     * @param mixed ...$values
     *
     * @return \PlanB\DS\Sequence
     */
    public function unshift(...$values): Sequence
    {
        $this->hook(function (...$values): void {
            $this->items->unshift(...$values);
        }, ...$values);

        return $this;
    }

    /**
     * Return the maximum value
     *
     * @param callable|null $comparator
     *
     * @return mixed
     */
    public function max(?callable $comparator = null)
    {
        return $this->sorted($comparator)
            ->last();
    }


    /**
     * Return the minimun value
     *
     * @param callable|null $comparator
     *
     * @return mixed
     */
    public function min(?callable $comparator = null)
    {
        return $this->sorted($comparator)
            ->first();
    }
}
