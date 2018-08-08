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

/**
 * Generic Collection
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class ItemList extends AbstractList
{

    /**
     * Crea una instancia a partir de un conjunto de valores
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\ItemList\ItemList
     */
    public static function create(iterable $input = []): ItemList
    {
        $list = new static();
        $list->setAll($input);

        return $list;
    }
}
