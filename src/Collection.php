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
     * @var mixed[]
     */
    private $items = [];

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
     * Devuelve un elemento
     *
     * @param mixed $key
     *
     * @return mixed
     */
    public function itemGet($key)
    {
        return $this->items[$key];
    }
}
