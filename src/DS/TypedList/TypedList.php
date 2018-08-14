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
 * Lista donde todos los elementos son del mismo tipo
 */
class TypedList extends AbstractTypedList
{

    /**
     * @var string
     */
    private $innerType;

    /**
     * TypedList constructor.
     *
     * @param string $innerType
     */
    public function __construct(string $innerType)
    {
        $this->innerType = $innerType;
        parent::__construct();
    }

    /**
     * Crea una instancia a partir de un conjunto de valores
     *
     * @param string  $innerType
     * @param mixed[] $input
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public static function create(string $innerType, iterable $input = []): ListInterface
    {
        $list = new static($innerType);
        $list->setAll($input);

        return $list;
    }

    /**
     * Devuelve el tipo de la lista
     *
     * @return string
     */
    public function getInnerType(): string
    {
        return $this->innerType;
    }
}
