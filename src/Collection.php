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

    /**
     * @var string
     */
    private $type;

    /**
     * @var mixed[]
     */
    private $items = [];


    /**
     * Collection constructor.
     *
     * @param string $type
     */
    protected function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Crea una colleción de elementos para el tipo dado
     *
     * @param string $type
     *
     * @return \PlanB\Type\Collection
     */
    public static function ofType(string $type): self
    {
        return new static($type);
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
     * Agrega un item a la colección
     *
     * @param mixed $item
     */
    public function itemAppend($item): void
    {
        $this->items[] = $item;
    }


    /**
     * Agrega un conjunto de elementos
     *
     * @param mixed[]|iterable $items
     */
    public function itemAppendAll(iterable $items): void
    {
        foreach ($items as $value) {
            $this->itemAppend($value);
        }
    }

    /**
     * Agrega una pareja clave/valor a la colección
     *
     * @param mixed $key
     * @param mixed $value
     */
    public function itemSet($key, $value): void
    {
        $this->items[$key] = $value;
    }

    /**
     * Agrega un conjunto de parejas clave/valor
     *
     * @param mixed[]|iterable $items
     */
    public function itemSetAll(iterable $items): void
    {
        foreach ($items as $key => $value) {
            $this->itemSet($key, $value);
        }
    }


    /**
     * Devuelve un elemento
     *
     * @param mixed      $key
     *
     * @param mixed|null $default
     *
     * @return mixed
     */
    public function itemGet($key, $default = null)
    {
        $notExists = !$this->itemExists($key);
        $notPassDefault = (1 === func_num_args());

        if ($notExists && $notPassDefault) {
            throw ItemNotFoundException::forKey((string) $key);
        }

        return $this->items[$key] ?? $default;
    }

    /**
     * Indica si un elemento existe
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function itemExists($key): bool
    {
        return isset($this->items[$key]);
    }

    /**
     * Elimina un elemento
     *
     * @param mixed $key
     */
    public function itemUnset($key): void
    {
        unset($this->items[$key]);
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
}
