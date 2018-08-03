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
use PlanB\DS\ItemList\Resolver\ResolverBag;

/**
 * Lista donde todos los elementos son del mismo tipo
 */
class TypedList extends AbstractList
{

    /**
     * @var string
     */
    protected $innerType;

    /**
     * ArrayList constructor.
     *
     * @param string $innerType
     */
    public function __construct(string $innerType)
    {
        ensure_typename($innerType)
            ->isValid();

        $this->innerType = $innerType;
        parent::__construct();
    }

    /**
     * Crea una instancia a partir de un conjunto de valores
     *
     * @param string  $innerType
     * @param mixed[] $input
     *
     * @return \PlanB\DS\TypedList\TypedList
     */
    public static function create(string $innerType, iterable $input = []): self
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

    /**
     * @inheritDoc
     */
    protected function customize(ResolverBag $resolverBag): void
    {
        $resolver = TypeResolver::create($this->getInnerType());
        $resolverBag->addResolver($resolver);
    }
}
