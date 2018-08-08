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
 * Normaliza la clave de un Item
 */
abstract class KeyNormalizer implements Resolvable
{

    /**
     * Resuelve un Item, normalizando la clave
     *
     * @param \PlanB\DS\ItemList\Item               $item
     *
     * @param null|\PlanB\DS\ItemList\ListInterface $context
     *
     * @return bool
     */
    public function __invoke(Item $item, ?ListInterface $context = null): bool
    {
        $key = $item->getKey();
        $value = $item->getValue();

        $newKey = $this->normalize($key, $value, $context);
        $item->setKey($newKey);

        return true;
    }

    /**
     * Devuelve la clave normalizada
     *
     * @param mixed                                 $key
     * @param mixed   |null                         $value
     * @param null|\PlanB\DS\ItemList\ListInterface $context
     *
     * @return mixed
     */
    abstract public function normalize($key, $value = null, ?ListInterface $context = null);
}
