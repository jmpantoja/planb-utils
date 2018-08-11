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
     * @param null|string $innerType
     */
    protected function __construct(?string $innerType = null)
    {
        $innerType = $innerType ?? $this->getInnerType();

        parent::__construct();
        $this->initialize($innerType);
    }

    /**
     * Inicializa la lista para un tipo de dato
     *
     * @param null|string $innerType
     */
    private function initialize(?string $innerType): void
    {

        if (is_null($innerType)) {
            return;
        }

        $validator = TypeValidator::create($innerType);
        $this->innerType = $innerType;

        $this->addValidator($validator, PHP_INT_MAX);
    }

    /**
     * Crea una instancia a partir de un conjunto de valores
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\ItemList\TypedList
     */
    public static function create(iterable $input = []): TypedList
    {
        $list = new static();
        $list->setAll($input);

        return $list;
    }

    /**
     * Crea una instancia a partir de un conjunto de valores
     *
     * @param string  $innerType
     * @param mixed[] $input
     *
     * @return \PlanB\DS\ItemList\TypedList
     */
    public static function ofType(string $innerType, iterable $input = []): TypedList
    {
        $list = new static($innerType);
        $list->setAll($input);

        return $list;
    }

    /**
     * Devuelve el tipo de la lista
     *
     * @return null|string
     */
    public function getInnerType(): ?string
    {
        return $this->innerType;
    }

    /**
     * @inheritdoc
     */
    protected function tryAddItem(Item $item): ListInterface
    {
        if (is_null($this->innerType)) {
            $this->initialize($item->getTypeName());
        }

        return parent::tryAddItem($item);
    }
}
