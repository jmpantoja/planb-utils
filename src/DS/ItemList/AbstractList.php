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

namespace PlanB\DS\ItemList;

use PlanB\DS\ItemList\Exception\ItemNotFoundException;
use PlanB\DS\ItemList\Resolver\ResolverBag;

/**
 * Generic Collection
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
abstract class AbstractList implements ListInterface
{

    use Traits\Accessors;

    /**
     * @var mixed[]
     */
    protected $items = [];

    /**
     * @var \SplPriorityQueue
     */
    protected $resolverBag;


    /**
     * ArrayList constructor.
     */
    public function __construct()
    {
        $this->items = [];
        $this->resolverBag = new ResolverBag();

        $this->customize($this->resolverBag);
    }


    /**
     * Añade un nuevo resolver
     *
     * @param callable|\PlanB\DS\ItemList\Resolver\ResolverInterface $resolver
     * @param int                                                    $priority
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function addResolver($resolver, int $priority = 0): ListInterface
    {
        $this->resolverBag->addResolver($resolver, $priority);

        return $this;
    }


    /**
     * Configura la lista
     *
     * @param \PlanB\DS\ItemList\Resolver\ResolverBag $resolverBag
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function customize(ResolverBag $resolverBag): void
    {
    }


    /**
     * Configura la Lista para que no se lanzen excepciones
     * cuando se trata de añadir un valor invalido
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function ignoreOnInvalid(): self
    {
        $this->resolverBag->ignoreOnInvalid();

        return $this;
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
     * @return \PlanB\DS\ItemList\ItemList
     */
    public function each(callable $callable, ...$userdata): ListInterface
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
     * @return \PlanB\DS\ItemList\ItemList
     */
    public function map(callable $callable, ...$userdata): ListInterface
    {
        if ($this->isEmpty()) {
            return clone $this;
        }

        $mapped = new static();
        foreach ($this->items as $key => $value) {
            $item = $callable($value, $key, ...$userdata);

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
     * @return \PlanB\DS\ItemList\ItemList
     */
    public function filter(callable $callable, ...$userdata): ListInterface
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

    /**
     * Retrieve an external iterator
     *
     * @return \Traversable An instance of an object implementing <b>Iterator</b> or
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->items);
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     */
    public function jsonSerialize()
    {
        return $this->items;
    }

    /**
     * Convierte el array en una cadena json
     *
     * @param int $options [optional] <p>
     *
     *                     Bitmask consisting of <b>JSON_HEX_QUOT</b>,
     *                     <b>JSON_HEX_TAG</b>,
     *                     <b>JSON_HEX_AMP</b>,
     *                     <b>JSON_HEX_APOS</b>,
     *                     <b>JSON_NUMERIC_CHECK</b>,
     *                     <b>JSON_PRETTY_PRINT</b>,
     *                     <b>JSON_UNESCAPED_SLASHES</b>,
     *                     <b>JSON_FORCE_OBJECT</b>,
     *                     <b>JSON_UNESCAPED_UNICODE</b>. The behaviour of these
     *                     constants is described on
     *                     the JSON constants page.
     *                     </p>
     * @param int $depth   [optional] <p>
     *                     Set the
     *                     maximum depth.
     *                     Must be
     *                     greater than
     *                     zero.
     *
     * @return string
     */
    public function toJson(int $options = 0, int $depth = 512): string
    {
        return json_encode($this, $options, $depth);
    }
}
