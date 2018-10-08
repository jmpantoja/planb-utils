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

namespace PlanB\DS\Map;

use Ds\Pair;
use PlanB\DS\Resolver\Resolver;
use PlanB\DS\Sequence;
use PlanB\DS\Set\Set;
use PlanB\DS\Traits\TraitArray;
use PlanB\DS\Traits\TraitCollection;
use PlanB\DS\Traits\TraitResolver;
use PlanB\DS\Vector\Vector;

/**
 * A Map is a sequential collection of key-value pairs, almost identical to an
 * array used in a similar context. Keys can be any type, but must be unique.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class AbstractMap implements \IteratorAggregate, \ArrayAccess, MapInterface
{
    use TraitCollection;
    use TraitResolver;
    use TraitArray;


    /**
     * @var \Ds\Map
     */
    protected $items;


    /**
     * AbstractMap constructor.
     *
     * @param mixed[]                          $input
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     */
    public function __construct(iterable $input, ?Resolver $resolver = null)
    {
        $this->bind($resolver);
        $this->putAll($input);
    }


    /**
     * @inheritdoc
     */
    protected function makeInternal(): \DS\Map
    {
        return new \DS\Map();
    }

    /**
     * Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    protected function duplicate(iterable $input = []): MapInterface
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
        $this->resolver->value(function ($value, $offset): void {
            $this->items[$offset] = $value;
        }, $value, $offset);
    }


    /**
     * Updates all values by applying a callback function to each value.
     *
     * @param callable $callback Accepts two arguments: key and value, should
     *                           return what the updated value will be.
     */
    public function apply(callable $callback): void
    {
        $this->items->apply($callback);
    }

    /**
     * Return the first Pair from the Map
     *
     * @return \Ds\Pair
     *
     * @throws \PlanB\DS\UnderflowException
     */
    public function first(): Pair
    {
        return $this->items->first();
    }

    /**
     * Return the last Pair from the Map
     *
     * @return \Ds\Pair
     *
     * @throws \PlanB\DS\UnderflowException
     */
    public function last(): Pair
    {
        return $this->items->last();
    }

    /**
     * Return the pair at a specified position in the Map
     *
     * @param int $position
     *
     * @return \Ds\Pair
     *
     * @throws \PlanB\DS\OutOfRangeException
     */
    public function skip(int $position): Pair
    {
        return $this->items->skip($position);
    }

    /**
     * Returns the result of associating all keys of a given traversable object
     * or array with their corresponding values, as well as those of this map.
     *
     * @param mixed[]|\Traversable $values
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function merge($values): MapInterface
    {
        return $this->duplicate(
            $this->items->merge($values)
        );
    }

    /**
     * Creates a new map containing the pairs of the current instance whose keys
     * are also present in the given map. In other words, returns a copy of the
     * current map with all keys removed that are not also in the other map.
     *
     * @param \PlanB\DS\Map $map The other map.
     *
     * @return \PlanB\DS\Map\MapInterface A new map containing the pairs of the current instance
     *                 whose keys are also present in the given map. In other
     *                 words, returns a copy of the current map with all keys
     *                 removed that are not also in the other map.
     */
    public function intersect(Map $map): MapInterface
    {
        $map = new \Ds\Map($map);

        return $this->duplicate(
            $this->items->intersect($map)
        );
    }

    /**
     * Returns the result of removing all keys from the current instance that
     * are present in a given map.
     *
     * @param \PlanB\DS\Map $map The map containing the keys to exclude.
     *
     * @return \PlanB\DS\Map\MapInterface The result of removing all keys from the current instance
     *                 that are present in a given map.
     */
    public function diff(Map $map): MapInterface
    {
        $map = new \Ds\Map($map);

        return $this->duplicate(
            $this->items->diff($map)
        );
    }


    /**
     * Returns whether an association a given key exists.
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function hasKey($key): bool
    {
        return $this->items->hasKey($key);
    }

    /**
     * Returns whether an association for a given value exists.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function hasValue($value): bool
    {
        return $this->items->hasValue($value);
    }


    /**
     * Returns a new map containing only the values for which a predicate
     * returns true. A boolean test will be used if a predicate is not provided.
     *
     * @param callable|null $callback Accepts a key and a value, and returns:
     *                                true : include the value,
     *                                false: skip the value.
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function filter(?callable $callback = null): MapInterface
    {
        return $callback ?
            $this->duplicate(
                $this->items->filter($callback)
            ) :
            $this->duplicate(
                $this->items->filter()
            );
    }

    /**
     * Returns the value associated with a key, or an optional default if the
     * key is not associated with a value.
     *
     * @param mixed $key
     * @param mixed $default
     *
     * @return mixed The associated value or fallback default if provided.
     *
     * @throws \PlanB\DS\OutOfBoundsException if no default was provided and the key is
     *                               not associated with a value.
     */
    public function get($key, $default = null)
    {
        return $this->items->get($key, $default);
    }

    /**
     * Returns a set of all the keys in the map.
     *
     * @return \PlanB\DS\Set\Set
     */
    public function keys(): Set
    {
        return Set::make($this->items->keys());
    }

    /**
     * Returns a new map using the results of applying a callback to each value.
     *
     * The keys will be equal in both maps.
     *
     * @param callable $callback Accepts two arguments: key and value, should
     *                           return what the updated value will be.
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function map(callable $callback): MapInterface
    {
        return $this->duplicate(
            $this->items->map($callback)
        );
    }

    /**
     * Returns a sequence of pairs representing all associations.
     *
     * @return \PlanB\DS\Sequence
     */
    public function pairs(): Sequence
    {
        return Vector::make(
            $this->items->pairs()
        );
    }

    /**
     * Associates a key with a value, replacing a previous association if there
     * was one.
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function put($key, $value): MapInterface
    {
        $this->resolver->value(function ($value, $key): void {
            $this->items->put($key, $value);
        }, $value, $key);

        return $this;
    }

    /**
     * Creates associations for all keys and corresponding values of either an
     * array or iterable object.
     *
     * @param \Traversable|mixed[] $values
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function putAll(iterable $values): MapInterface
    {
        foreach ($values as $key => $value) {
            $this->put($key, $value);
        }

        return $this;
    }

    /**
     * Iteratively reduces the map to a single value using a callback.
     *
     * @param callable   $callback Accepts the carry, key, and value, and
     *                             returns an updated carry value.
     *
     * @param mixed|null $initial  Optional initial carry value.
     *
     * @return mixed The carry value of the final iteration, or the initial
     *               value if the map was empty.
     */
    public function reduce(callable $callback, $initial = null)
    {
        return $this->items->reduce($callback, $initial);
    }


    /**
     * Removes a key's association from the map and returns the associated value
     * or a provided default if provided.
     *
     * @param mixed $key
     * @param mixed $default
     *
     * @return mixed The associated value or fallback default if provided.
     *
     * @throws \OutOfBoundsException if no default was provided and the key is
     *                               not associated with a value.
     */
    public function remove($key, $default = null)
    {
        return $this->items->remove($key, $default);
    }

    /**
     * Returns a reversed copy of the map.
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function reverse(): MapInterface
    {
        $this->items->reverse();

        return $this;
    }

    /**
     * Returns a reversed copy of the map.
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function reversed(): MapInterface
    {
        return $this->duplicate(
            $this->items->reversed()
        );
    }

    /**
     * Returns a sub-sequence of a given length starting at a specified offset.
     *
     * @param int      $offset If the offset is non-negative, the map will
     *                         start at that offset in the map. If offset
     *                         is negative, the map will start that far
     *                         from the end.
     *
     * @param int|null $length If a length is given and is positive, the
     *                         resulting set will have up to that many pairs in
     *                         it. If the requested length results in an
     *                         overflow, only pairs up to the end of the map
     *                         will be included.
     *
     *                         If a length is given and is negative, the map
     *                         will stop that many pairs from the end.
     *
     *                         If a length is not provided, the resulting map
     *                         will contains all pairs between the offset and
     *                         the end of the map.
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function slice(int $offset, ?int $length = null): MapInterface
    {
        $items = $length ?
            $this->items->slice($offset, $length) :
            $this->items->slice($offset);

        return $this->duplicate($items);
    }

    /**
     * Sorts the map in-place, based on an optional callable comparator.
     *
     * The map will be sorted by value.
     *
     * @param callable|null $comparator Accepts two values to be compared.
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function sort(?callable $comparator = null): MapInterface
    {
        $comparator ?
            $this->items->sort($comparator) :
            $this->items->sort();

        return $this;
    }

    /**
     * Returns a sorted copy of the map, based on an optional callable
     * comparator. The map will be sorted by value.
     *
     * @param callable|null $comparator Accepts two values to be compared.
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function sorted(?callable $comparator = null): MapInterface
    {

        $items = $comparator ?
            $this->items->sorted($comparator) :
            $this->items->sorted();

        return $this->duplicate($items);
    }

    /**
     * Sorts the map in-place, based on an optional callable comparator.
     *
     * The map will be sorted by key.
     *
     * @param callable|null $comparator Accepts two keys to be compared.
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function ksort(?callable $comparator = null): MapInterface
    {

        $comparator ?
            $this->items->ksort($comparator) :
            $this->items->ksort();

        return $this;
    }

    /**
     * Returns a sorted copy of the map, based on an optional callable
     * comparator. The map will be sorted by key.
     *
     * @param callable|null $comparator Accepts two keys to be compared.
     *
     * @return \PlanB\DS\Map\MapInterface
     */
    public function ksorted(?callable $comparator = null): MapInterface
    {
        $items = $comparator ?
            $this->items->ksorted($comparator) :
            $this->items->ksorted();

        return $this->duplicate($items);
    }


    /**
     * Returns a sequence of all the associated values in the Map.
     *
     * @return \PlanB\DS\Sequence
     */
    public function values(): Sequence
    {
        return Vector::make(
            $this->items->values()
        );
    }

    /**
     * Creates a new map that contains the pairs of the current instance as well
     * as the pairs of another map.
     *
     * @param \PlanB\DS\Map $map The other map, to combine with the current instance.
     *
     * @return \PlanB\DS\Map\MapInterface A new map containing all the pairs of the current
     *                 instance as well as another map.
     */
    public function union(Map $map): MapInterface
    {

        $map = new \DS\Map($map);
        $items = $this->items->union($map);

        return $this->duplicate($items);
    }

    /**
     * Creates a new map using keys of either the current instance or of another
     * map, but not of both.
     *
     * @param \PlanB\DS\Map $map
     *
     * @return \PlanB\DS\Map\MapInterface A new map containing keys in the current instance as well
     *                 as another map, but not in both.
     */
    public function xor(Map $map): MapInterface
    {
        $map = new \DS\Map($map);
        $items = $this->items->xor($map);

        return $this->duplicate($items);
    }
}
