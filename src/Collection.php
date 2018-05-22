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

namespace PlanB\Type;

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
    private $items = [];

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
     * @param null     $userdata
     *
     * @return \PlanB\Type\Collection
     */
    public function each(callable $callable, $userdata = null): self
    {
        array_walk($this->items, $callable, $userdata);

        return $this;
    }


    /**
     * Devuelve el resultado de aplicar una acción a cada elemento de la colección
     *
     * La colección original permanece inmutable
     *
     * @param callable   $callable
     * @param null|mixed $userdata
     *
     * @return \PlanB\Type\Collection
     */
    public function map(callable $callable, $userdata = null): self
    {
        if ($this->isEmpty()) {
            return clone $this;
        }

        $mapped = null;
        foreach ($this->items as $key => $value) {
            $item = $callable($value, $key, $userdata);

            $mapped = $mapped ?? $this->buildMapped($item);
            $mapped->itemSet($key, $item);
        }

        return $mapped;
    }

    /**
     * Devuelve una colección del mismo tipo que el valor pasado
     *
     * @param mixed $value
     *
     * @return \PlanB\Type\Collection
     */
    private function buildMapped($value): self
    {
        $type = is_object($value) ? get_class($value) : gettype($value);

        return new Collection($type);
    }
}
