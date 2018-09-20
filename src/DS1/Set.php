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

namespace PlanB\DS1;

use PlanB\DS1\Resolver\Resolver;
use PlanB\DS1\Traits\TraitArray;
use PlanB\DS1\Traits\TraitCollection;

/**
 * A sequence of unique values.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class Set implements \IteratorAggregate, \ArrayAccess, Collection
{

    use TraitCollection;
    use Traits\TraitResolver;
    use TraitArray;



    /**
     * @param mixed[]                           $input
     *
     * @param null|\PlanB\DS1\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS1\Set
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): Set
    {
        return (new static($resolver))
            ->addAll($input);
    }

    /**
     * @inheritdoc
     */
    protected function makeInternal(): \DS\Collection
    {
        return new \DS\Set();
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
            $this->hook(function ($value) use ($offset): void {
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
     * @return \PlanB\DS1\Set
     */
    public function add($value): Set
    {
        $this->hook(function ($value): void {
            $this->items->add($value);
        }, $value);

        return $this;
    }


    /**
     * Adds zero or more values to the set.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS1\Set
     */
    public function addAll(iterable $input): Set
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
     * @param \PlanB\DS1\Set $set
     *
     * @return \PlanB\DS1\Set
     */
    public function diff(Set $set): Set
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
     * @param \PlanB\DS1\Set $set
     *
     * @return \PlanB\DS1\Set
     */
    public function xor(Set $set): Set
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
     * @return \PlanB\DS1\Set
     */
    public function filter(?callable $callback = null): Set
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
     * @throws \PlanB\DS1\OutOfRangeException
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
     * @param \PlanB\DS1\Set $set
     *
     * @return \PlanB\DS1\Set
     */
    public function intersect(Set $set): Set
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
     * @return \PlanB\DS1\Set
     */
    public function remove(...$values): Set
    {
        $this->items->remove(...$values);

        return $this;
    }

    /**
     * Reverses the set in-place.
     *
     * @return  \PlanB\DS1\Set
     */
    public function reverse(): Set
    {
        $this->items->reverse();

        return $this;
    }

    /**
     * Returns a reversed copy of the set.
     *
     * @return \PlanB\DS1\Set
     */
    public function reversed(): Set
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
     * @return \PlanB\DS1\Set
     */
    public function slice(int $offset, ?int $length = null): Set
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
     * @return \PlanB\DS1\Map
     */
    public function sort(?callable $comparator = null): Set
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
     * @return \PlanB\DS1\Set
     */
    public function sorted(?callable $comparator = null): Set
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
     * @return \Ds\Set
     */
    public function merge(iterable $values): Set
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
     * @param \PlanB\DS1\Set $set
     *
     * @return \PlanB\DS1\Set
     */
    public function union(Set $set): Set
    {
        $set = new \DS\Set($set);
        $items = $this->items->union($set);

        return $this->duplicate($items);
    }
}
