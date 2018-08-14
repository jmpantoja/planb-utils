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

namespace PlanB\DS\ItemList\Traits;

use PlanB\DS\ItemList\Exception\ItemNotFoundException;
use PlanB\DS\ItemList\Item;
use PlanB\DS\ItemList\ListInterface;

/**
 * Agrupa los métodos relacionados con agregar o devolver elementos de la lista
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
trait Accessors
{

    /**
     * @var mixed[]
     */
    protected $items = [];

    /**
     * @var \PlanB\DS\ItemList\Resolver
     */
    protected $resolution;


    /**
     * @inheritdoc
     *
     * @param mixed $value
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function add($value): ListInterface
    {
        return $this->tryAddItem(Item::fromValue($value));
    }


    /**
     * @inheritdoc
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function addAll(iterable $items): ListInterface
    {
        foreach ($items as $value) {
            $this->add($value);
        }

        return $this;
    }


    /**
     * @inheritdoc
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function clearAndAdd(iterable $items): ListInterface
    {
        return $this
            ->clear()
            ->addAll($items);
    }


    /**
     * @inheritdoc
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return $this
     */
    public function set($key, $value): ListInterface
    {
        return $this->tryAddItem(Item::fromKeyValue($key, $value));
    }

    /**
     * @inheritdoc
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function setAll(iterable $items): ListInterface
    {

        foreach ($items as $key => $value) {
            $this->set($key, $value);
        }

        return $this;
    }


    /**
     * @inheritdoc
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function clearAndSet(iterable $items): ListInterface
    {
        return $this
            ->clear()
            ->setAll($items);
    }

    /**
     * @inheritdoc
     *
     * @param mixed $key
     *
     * @param mixed|null $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $notExists = !$this->exists($key);
        $notPassDefault = (1 === func_num_args());

        if ($notExists && $notPassDefault) {
            throw ItemNotFoundException::forKey((string) $key);
        }

        return $this->items[$key] ?? $default;
    }

    /**
     * @inheritdoc
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function exists($key): bool
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * @inheritdoc
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function has($key): bool
    {
        return $this->exists($key);
    }

    /**
     * @inheritdoc
     *
     * @param mixed $key
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function remove($key): ListInterface
    {
        unset($this->items[$key]);

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function clear(): ListInterface
    {
        $this->items = [];

        return $this;
    }


    /**
     * Resuelve y añade un item
     *
     * @param \PlanB\DS\ItemList\Item $item
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    protected function tryAddItem(Item $item): ListInterface
    {
        $valid = $this->resolution->resolve($item);

        if ($valid) {
            $this->addItemWithKey($item);
            $this->addItemWithoutKey($item);
        }

        return $this;
    }


    /**
     * Agrega un nuevo Item a la lista
     * en el caso de que la clave esté definida
     *
     * @param \PlanB\DS\ItemList\Item $item
     *
     * @return $this
     */
    private function addItemWithKey(Item $item): ListInterface
    {
        if (!$item->hasKey()) {
            return $this;
        }

        $value = $item->getValue();
        $key = $item->getKey();

        $this->items[$key] = $value;

        return $this;
    }


    /**
     * Agrega un nuevo Item a la lista
     * en el caso de que la clave no esté definida
     *
     * @param \PlanB\DS\ItemList\Item $item
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    private function addItemWithoutKey(Item $item): ListInterface
    {
        if ($item->hasKey()) {
            return $this;
        }

        $value = $item->getValue();
        $this->items[] = $value;

        return $this;
    }
}
