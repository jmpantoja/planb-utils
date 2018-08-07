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

namespace PlanB\DS\ItemList\Resolver;

use PlanB\DS\ItemList\Item;
use PlanB\DS\ItemList\ListInterface;

/**
 * Valida un Item
 */
abstract class Validator implements Resolvable
{

    /**
     * Resuelve un Item, asegurando que es válido
     *
     * @param \PlanB\DS\ItemList\Item          $item
     *
     * @param \PlanB\DS\ItemList\ListInterface $context
     *
     * @return bool
     */
    public function __invoke(Item $item, ListInterface $context): bool
    {
        $value = $item->getValue();
        $key = $item->getKey();

        return $this->validate($value, $key, $context);
    }

    /**
     * Valida un item
     *
     * @param mixed                            $value
     * @param mixed                            $key
     * @param \PlanB\DS\ItemList\ListInterface $context
     *
     * @return bool
     */
    abstract public function validate($value, $key = null, ?ListInterface $context = null): bool;
}
