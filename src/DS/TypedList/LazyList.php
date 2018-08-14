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

namespace PlanB\DS\TypedList;

use PlanB\DS\ItemList\AbstractList;
use PlanB\DS\ItemList\Item;
use PlanB\DS\ItemList\ItemList;
use PlanB\DS\ItemList\ListInterface;

/**
 * Una Lista que adopta el tipo del primer elemento añadido
 */
class LazyList extends AbstractList
{

    /**
     * @var \PlanB\DS\ItemList\ListInterface
     */
    private $innerList;

    /**
     * LazyList constructor.
     *
     * @param \PlanB\DS\ItemList\ListInterface $innerList
     */
    protected function __construct(?ListInterface $innerList = null)
    {
        $this->innerList = $innerList;
    }

    /**
     * LazyList Named Constructor
     *
     * @param \PlanB\DS\ItemList\ListInterface $list
     *
     * @return \PlanB\DS\TypedList\LazyList
     */
    public static function create(ListInterface $list): LazyList
    {

        if ($list instanceof TypedListInterface) {
            return new static();
        }

        return new static(ItemList::create());
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

        if (!($this->innerList instanceof ListInterface)) {
            $this->innerList = TypedListFactory::fromValue($item->getValue());
        }

        $this->innerList->tryAddItem($item);

        return $this;
    }


    /**
     * Devuelve la Lista creada
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function getInnerList(): ListInterface
    {
        return $this->innerList;
    }
}
