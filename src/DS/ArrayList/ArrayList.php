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

namespace PlanB\DS\ArrayList;

use PlanB\DS\ArrayList\Exception\ItemNotFoundException;
use PlanB\DS\ItemResolver\ItemResolver;
use PlanB\DS\KeyValue;

/**
 * Generic Collection
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class ArrayList implements \Countable
{

    use Traits\Mutators;

    /**
     * @var mixed[]
     */
    protected $items = [];

    /**
     * Crea el objecto ItemResolver
     *
     * Hacer que la construcción del objeto ItemResolver dependa un KeyValue, nos permite ajustarlo al primer elemento
     * de la colección, y por consecuencia, crear colecciones agnosticas que tomen el tipo del primer elemento
     *
     * @param \PlanB\DS\KeyValue $first
     *
     * @return \PlanB\DS\ItemResolver\ItemResolver
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function buildItemResolver(KeyValue $first): ItemResolver
    {
        $resolver = ItemResolver::create();

        return $resolver;
    }

    /**
     * ArrayList constructor.
     */
    public function __construct()
    {
        $this->items = [];
    }

    /**
     * Crea una instancia a partir de un conjunto de valores
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\ArrayList\ArrayList
     */
    public static function fromArray(iterable $input): ArrayList
    {
        $collection = new static();
        $collection->setAll($input);

        return $collection;
    }

    /**
     * Devuelve el número total de elementos
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Indica si la colección está vacia
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 === $this->count();
    }

    /**
     * Ejecuta una acción para cada elemento de la colección
     *
     * @param callable $callable
     * @param mixed    ...$userdata
     *
     * @return \PlanB\DS\ArrayList\ArrayList
     */
    public function each(callable $callable, ...$userdata): self
    {
        foreach ($this->items as $key => $value) {
            $callable($value, $key, ...$userdata);
        }

        return $this;
    }


    /**
     * Devuelve el resultado de aplicar una acción a cada elemento de la colección
     *
     * La colección original permanece inmutable
     *
     * @param callable $callable
     * @param mixed    ...$userdata
     *
     * @return \PlanB\DS\ArrayList\ArrayList
     */
    public function map(callable $callable, ...$userdata): self
    {
        if ($this->isEmpty()) {
            return clone $this;
        }

        $mapped = new static();
        foreach ($this->items as $key => $value) {
            $item = $callable($value, $key, ...$userdata);

//            $mapped = $mapped ?? CollectionBuilder::fromValueType($item);
            $mapped->set($key, $item);
        }

        return $mapped;
    }

    /**
     * Devuelve una colección con los elementos que cumplen un criterio
     *
     * @param callable $callable
     * @param mixed    ...$userdata
     *
     * @return \PlanB\DS\ArrayList\ArrayList
     */
    public function filter(callable $callable, ...$userdata): self
    {
        $filtered = new static();

        foreach ($this->items as $key => $value) {
            if (!$callable($value, $key, ...$userdata)) {
                continue;
            }

            $filtered->set($key, $value);
        }

        return $filtered;
    }

    /**
     * Devuelve el primer elemento que cumpla con el criterio,
     * o nulo si no encuentra ninguno
     *
     * @param callable $callable
     * @param mixed    ...$userdata
     *
     * @return mixed|null
     */
    public function search(callable $callable, ...$userdata)
    {

        foreach ($this->items as $key => $value) {
            if ($callable($value, $key, ...$userdata)) {
                return $value;
            }
        }
    }

    /**
     * Devuelve el primer elemento que cumpla con el criterio,
     * o lanza una excepción si no encuentra ninguno
     *
     * @param callable $callable
     * @param mixed    ...$userdata
     *
     * @return mixed
     */
    public function find(callable $callable, ...$userdata)
    {
        foreach ($this->items as $key => $value) {
            if ($callable($value, $key, ...$userdata)) {
                return $value;
            }
        }

        throw ItemNotFoundException::forCondition();
    }

    /**
     * Reduce una colección, a un unico valor
     *
     * @param callable   $callable
     * @param mixed|null $initial
     * @param mixed      ...$userdata
     *
     * @return mixed
     */
    public function reduce(callable $callable, $initial = null, ...$userdata)
    {
        foreach ($this->items as $value) {
            $initial = $callable($value, $initial, ...$userdata);
        }

        return $initial;
    }

    /**
     * Devuelve un array con los elementos de la colección
     *
     * @param callable|null $callable
     * @param mixed         ...$userdata
     *
     * @return mixed[]
     */
    public function toArray(?callable $callable = null, ...$userdata): array
    {
        if (!is_callable($callable)) {
            return $this->items;
        }

        $map = [];
        foreach ($this->items as $key => $value) {
            $map[] = $callable($value, $key, ...$userdata);
        }

        return $map;
    }
}
