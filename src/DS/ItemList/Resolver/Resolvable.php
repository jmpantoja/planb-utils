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
 * Representa a una acción que se realiza antes de añadir un valor a la lista
 */
interface Resolvable
{
    /**
     * Resuelve un item, indicando si es valido o no para continuar con el
     *
     * @param \PlanB\DS\ItemList\Item               $item
     *
     * @param null|\PlanB\DS\ItemList\ListInterface $context
     *
     * @return bool
     */
    public function __invoke(Item $item, ?ListInterface $context = null): bool;
}
