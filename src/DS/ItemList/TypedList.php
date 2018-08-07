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

use PlanB\DS\ItemList\Resolver\TypeValidator;

/**
 * Una lista donde sus elementos son del mismo tipo
 */
class TypedList extends AbstractList implements TypableList
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

        $validator = TypeValidator::create($innerType);
        $this->innerType = $innerType;

        parent::__construct();

        $this->addValidator($validator, PHP_INT_MAX);
    }

    /**
     * Crea una instancia a partir de un conjunto de valores
     *
     * @param string  $innerType
     * @param mixed[] $input
     *
     * @return \PlanB\DS\ItemList\ItemList
     */
    public static function create(string $innerType, iterable $input = []): TypedList
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
