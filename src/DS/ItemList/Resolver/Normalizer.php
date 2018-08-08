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
 * Normaliza el valor de un Item
 */
abstract class Normalizer implements Resolvable
{

    /**
     * Resuelve un Item, normalizando el valor
     *
     * @param \PlanB\DS\ItemList\Item               $item
     *
     * @param null|\PlanB\DS\ItemList\ListInterface $context
     *
     * @return bool
     */
    public function __invoke(Item $item, ?ListInterface $context = null): bool
    {
        $value = $item->getValue();
        $key = $item->getKey();

        $newValue = $this->normalize($value, $key, $context);
        $item->setValue($newValue);

        return true;
    }

    /**
     * Devuelve el valor normalizado
     *
     * @param mixed                                 $value
     * @param null |mixed                           $key
     * @param null|\PlanB\DS\ItemList\ListInterface $context
     *
     * @return mixed
     */
    abstract public function normalize($value, $key = null, ?ListInterface $context = null);
}
