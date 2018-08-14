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

use PlanB\DS\ItemList\ListInterface;

/**
 * Intefaz para listas donde todos los elementos son del mismo tipo
 */
interface TypedListInterface extends ListInterface
{
    /**
     * Devuelve el tipo de la lista
     *
     * @return null|string
     */
    public function getInnerType(): string;
}
