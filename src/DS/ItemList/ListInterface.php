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

namespace PlanB\DS\ItemList;

/**
 * Representa a un conjunto de elementos que cumplen una serie de normas
 */
interface ListInterface extends \Countable, \IteratorAggregate, \JsonSerializable
{


    /**
     * Agrega un nuevo item a la lista, sin clave
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function add($value): ListInterface;

    /**
     * Agrega un conjunto de items sin clave
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function addAll(iterable $items): ListInterface;


    /**
     * Elimina todos los elemntos de la lista  y
     * agrega un nuevo conjunto de Items sin clave
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function clearAndAdd(iterable $items): ListInterface;

    /**
     * Agrega un nuevo Item a la lista, con clave
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return $this
     */
    public function set($key, $value): ListInterface;


    /**
     * Agrega un conjunto de Items con clave
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function setAll(iterable $items): ListInterface;

    /**
     * Elimina todos los elemntos de la lista  y
     * agrega un nuevo conjunto de Items con clave
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function clearAndSet(iterable $items): ListInterface;


    /**
     * Devuelve un elemento
     *
     * @param mixed      $key
     *
     * @param mixed|null $default
     *
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Indica si un elemento existe
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function exists($key): bool;

    /**
     * exists alias
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function has($key): bool;

    /**
     * Elimina un elemento
     *
     * @param mixed $key
     *
     * @return $this
     */
    public function remove($key): ListInterface;


    /**
     * Elimina todos los elementos de la lista
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function clear(): ListInterface;

    /**
     * Devuelve el número total de elementos
     *
     * @return int
     */
    public function count(): int;

    /**
     * Indica si la lista está vacia
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Ejecuta una acción para cada elemento de la lista
     *
     * @param callable $callable
     * @param mixed    ...$userdata
     *
     * @return \PlanB\DS\ItemList\ItemList
     */
    public function each(callable $callable, ...$userdata): self;


    /**
     * Devuelve el resultado de aplicar una acción a cada elemento de la lista
     *
     * La lista original permanece inmutable
     *
     * @param callable $callable
     * @param mixed    ...$userdata
     *
     * @return \PlanB\DS\ItemList\ItemList
     */
    public function map(callable $callable, ...$userdata): self;

    /**
     * Devuelve una lista con los elementos que cumplen un criterio
     *
     * @param callable $callable
     * @param mixed    ...$userdata
     *
     * @return \PlanB\DS\ItemList\ItemList
     */
    public function filter(callable $callable, ...$userdata): self;

    /**
     * Devuelve el primer elemento que cumpla con el criterio,
     * o nulo si no encuentra ninguno
     *
     * @param callable $callable
     * @param mixed    ...$userdata
     *
     * @return mixed|null
     */
    public function search(callable $callable, ...$userdata);

    /**
     * Devuelve el primer elemento que cumpla con el criterio,
     * o lanza una excepción si no encuentra ninguno
     *
     * @param callable $callable
     * @param mixed    ...$userdata
     *
     * @return mixed
     */
    public function find(callable $callable, ...$userdata);

    /**
     * Reduce una lista, a un unico valor
     *
     * @param callable   $callable
     * @param mixed|null $initial
     * @param mixed      ...$userdata
     *
     * @return mixed
     */
    public function reduce(callable $callable, $initial = null, ...$userdata);

    /**
     * Devuelve un array con los elementos de la lista
     *
     * @param callable|null $callable
     * @param mixed         ...$userdata
     *
     * @return mixed[]
     */
    public function toArray(?callable $callable = null, ...$userdata): array;

    /**
     * Retrieve an external iterator
     *
     * @return \Traversable An instance of an object implementing <b>Iterator</b> or
     */
    public function getIterator(): \Traversable;

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     */
    public function jsonSerialize();

    /**
     * Convierte el array en una cadena json
     *
     * @param int $options
     * @param int $depth
     *
     * @return string
     */
    public function toJson(int $options = 0, int $depth = 512): string;

    /**
     * Silencia las excepciones
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function silentExceptions(): ListInterface;

    /**
     * Añade un hydrator
     *
     * @param string   $type
     * @param callable $hydrator
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function addHydrator(string $type, callable $hydrator): ListInterface;

    /**
     * Añade un validador
     *
     * @param callable $validator
     * @param int      $order
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function addValidator(callable $validator, int $order = 1): ListInterface;

    /**
     * Añade un normalizador
     *
     * @param callable $normalizer
     * @param int      $order
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function addNormalizer(callable $normalizer, int $order = 1): ListInterface;

    /**
     * Añade un normalizador de clave
     *
     * @param callable $validator
     * @param int      $order
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function addKeyNormalizer(callable $validator, int $order = 1): ListInterface;
}
