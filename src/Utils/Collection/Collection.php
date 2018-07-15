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

namespace PlanB\Utils\Collection;

use PlanB\Utils\Collection\Exception\ItemNotFoundException;
use PlanB\Utils\Collection\Utilities\CollectionBuilder;

/**
 * Generic Collection
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class Collection implements \Countable
{

    use Traits\Mutators;

    /**
     * @var mixed[]
     */
    protected $items = [];

    /**
     * @var string
     */
    private $type;

    /**
     * Collection constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Devuelve el tipo de la colleción
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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
     * @return \PlanB\Utils\Collection\Collection
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
     * @return \PlanB\Utils\Collection\Collection
     */
    public function map(callable $callable, ...$userdata): self
    {
        if ($this->isEmpty()) {
            return clone $this;
        }

        $mapped = null;
        foreach ($this->items as $key => $value) {
            $item = $callable($value, $key, ...$userdata);

            $mapped = $mapped ?? CollectionBuilder::fromValueType($item);
            $mapped->itemSet($key, $item);
        }

        return $mapped;
    }

    /**
     * Devuelve una colección con los elementos que cumplen un criterio
     *
     * @param callable $callable
     * @param mixed    ...$userdata
     *
     * @return \PlanB\Utils\Collection\Collection
     */
    public function filter(callable $callable, ...$userdata): self
    {
        $filtered = CollectionBuilder::fromType($this->getType());

        foreach ($this->items as $key => $value) {
            if (!$callable($value, $key, ...$userdata)) {
                continue;
            }

            $filtered->itemSet($key, $value);
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
    public function itemSearch(callable $callable, ...$userdata)
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
    public function itemFind(callable $callable, ...$userdata)
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
