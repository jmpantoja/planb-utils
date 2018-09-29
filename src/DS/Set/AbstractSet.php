<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace PlanB\DS\Set;

use PlanB\DS\Resolver\Resolver;
use PlanB\DS\Traits\TraitArray;
use PlanB\DS\Traits\TraitCollection;
use PlanB\DS\Traits\TraitResolver;

/**
 * A sequence of unique values.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
abstract class AbstractSet implements \IteratorAggregate, \ArrayAccess, SetInterface
{

    use TraitCollection;
    use TraitResolver;
    use TraitArray;


    /**
     * @var \Ds\Set
     */
    protected $items;

    /**
     * AbstractSet constructor.
     *
     * @param mixed[]                          $input
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     */
    public function __construct(iterable $input, ?Resolver $resolver = null)
    {
        $this->bind($resolver);
        $this->addAll($input);
    }

    /**
     * @inheritdoc
     */
    protected function makeInternal(): \DS\Set
    {
        return new \DS\Set();
    }

    /**
     * Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    protected function duplicate(iterable $input = []): SetInterface
    {
        return new static($input, $this->resolver);
    }

    /**
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     *                      The offset to assign the value to.
     *                      </p>
     * @param mixed $value  <p>
     *                      The
     *                      value
     *                      to
     *                      set.
     *                      </p>
     *
     * @return void
     *
     * @since 5.0.0
     */
    public function offsetSet($offset, $value): void
    {
        if (null === $offset) {
            $this->resolver->value(function ($value): void {
                $this->items->add($value);
            }, $value);

            return;
        }

        throw new \OutOfBoundsException();
    }

    /**
     * Adds zero or more values to the set.
     *
     * @param mixed $value
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function add($value): SetInterface
    {
        $this->resolver->value(function ($value): void {
            $this->items->add($value);
        }, $value);

        return $this;
    }


    /**
     * Adds zero or more values to the set.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function addAll(iterable $input): SetInterface
    {
        foreach ($input as $value) {
            $this->add($value);
        }

        return $this;
    }

    /**
     * Creates a new set using values from this set that aren't in another set.
     *
     * Formally: A \ B = {x ∈ A | x ∉ B}
     *
     * @param \PlanB\DS\Set $set
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function diff(Set $set): SetInterface
    {
        $set = new \DS\Set($set);
        $items = $this->items->diff($set);

        return $this->duplicate($items);
    }

    /**
     * Creates a new set using values in either this set or in another set,
     * but not in both.
     *
     * Formally: A ⊖ B = {x : x ∈ (A \ B) ∪ (B \ A)}
     *
     * @param \PlanB\DS\Set $set
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function xor(Set $set): SetInterface
    {
        $set = new \DS\Set($set);
        $items = $this->items->xor($set);

        return $this->duplicate($items);
    }

    /**
     * Returns a new set containing only the values for which a callback
     * returns true. A boolean test will be used if a callback is not provided.
     *
     * @param callable|null $callback Accepts a value, returns a boolean:
     *                                true : include the value,
     *                                false: skip the value.
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function filter(?callable $callback = null): SetInterface
    {
        $items = $callback ?
            $this->items->filter($callback) :
            $this->items->filter();


        return $this->duplicate($items);
    }

    /**
     * Returns the first value in the set.
     *
     * @return mixed the first value in the set.
     */
    public function first()
    {
        return $this->items->first();
    }

    /**
     * Returns the value at a specified position in the set.
     *
     * @param int $position
     *
     * @return mixed|null
     *
     * @throws \PlanB\DS\OutOfRangeException
     */
    public function get(int $position)
    {
        return $this->items->get($position);
    }

    /**
     * Creates a new set using values common to both this set and another set.
     *
     * In other words, returns a copy of this set with all values removed that
     * aren't in the other set.
     *
     * Formally: A ∩ B = {x : x ∈ A ∧ x ∈ B}
     *
     * @param \PlanB\DS\Set $set
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function intersect(Set $set): SetInterface
    {
        $set = new \DS\Set($set);
        $items = $this->items->intersect($set);

        return $this->duplicate($items);
    }


    /**
     * Returns the last value in the set.
     *
     * @return mixed the last value in the set.
     */
    public function last()
    {
        return $this->items->last();
    }

    /**
     * Iteratively reduces the set to a single value using a callback.
     *
     * @param callable   $callback Accepts the carry and current value, and
     *                             returns an updated carry value.
     *
     * @param mixed|null $initial  Optional initial carry value.
     *
     * @return mixed The carry value of the final iteration, or the initial
     *               value if the set was empty.
     */
    public function reduce(callable $callback, $initial = null)
    {
        return $this->items->reduce($callback, $initial);
    }

    /**
     * Removes zero or more values from the set.
     *
     * @param mixed ...$values
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function remove(...$values): SetInterface
    {
        $this->items->remove(...$values);

        return $this;
    }

    /**
     * Reverses the set in-place.
     *
     * @return  \PlanB\DS\Set\SetInterface
     */
    public function reverse(): SetInterface
    {
        $this->items->reverse();

        return $this;
    }

    /**
     * Returns a reversed copy of the set.
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function reversed(): SetInterface
    {
        $items = $this->items->reversed();

        return $this->duplicate($items);
    }

    /**
     * Returns a subset of a given length starting at a specified offset.
     *
     * @param int $offset If the offset is non-negative, the set will start
     *                    at that offset in the set. If offset is negative,
     *                    the set will start that far from the end.
     *
     * @param int $length If a length is given and is positive, the resulting
     *                    set will have up to that many values in it.
     *                    If the requested length results in an overflow, only
     *                    values up to the end of the set will be included.
     *
     *                    If a length is given and is negative, the set
     *                    will stop that many values from the end.
     *
     *                    If a length is not provided, the resulting set
     *                    will contains all values between the offset and the
     *                    end of the set.
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function slice(int $offset, ?int $length = null): SetInterface
    {

        $items = $length ?
            $this->items->slice($offset, $length) :
            $this->items->slice($offset);


        return $this->duplicate($items);
    }

    /**
     * Sorts the set in-place, based on an optional callable comparator.
     *
     * @param callable|null $comparator Accepts two values to be compared.
     *                                  Should return the result of a <=> b.
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function sort(?callable $comparator = null): SetInterface
    {
        $comparator ?
            $this->items->sort($comparator) :
            $this->items->sort();

        return $this;
    }

    /**
     * Returns a sorted copy of the set, based on an optional callable
     * comparator. Natural ordering will be used if a comparator is not given.
     *
     * @param callable|null $comparator Accepts two values to be compared.
     *                                  Should return the result of a <=> b.
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function sorted(?callable $comparator = null): SetInterface
    {

        $items = $comparator ?
            $this->items->sorted($comparator) :
            $this->items->sorted();

        return $this->duplicate($items);
    }

    /**
     * Returns the result of adding all given values to the set.
     *
     * @param mixed[]|\Traversable $values
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function merge(iterable $values): SetInterface
    {

        $items = $this->items->merge($values);

        return $this->duplicate($items);
    }


    /**
     * Creates a new set that contains the values of this set as well as the
     * values of another set.
     *
     * Formally: A ∪ B = {x: x ∈ A ∨ x ∈ B}
     *
     * @param \PlanB\DS\Set $set
     *
     * @return \PlanB\DS\Set\SetInterface
     */
    public function union(Set $set): SetInterface
    {
        $set = new \DS\Set($set);
        $items = $this->items->union($set);

        return $this->duplicate($items);
    }
}
