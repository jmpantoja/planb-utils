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

namespace PlanB\DS\Traits;

use PlanB\DS\Resolver\Resolver;
use PlanB\Type\DataType\DataType;

/**
 * Métodos asociados con la interfaz resolvable
 */
trait TraitResolver
{
    /**
     * @var \Ds\Collection
     */
    protected $items;

    /**
     * @var \PlanB\DS\Resolver\Resolver
     */
    private $resolver;


    /**
     * @inheritDoc
     */
    protected function bind(?Resolver $resolver = null)
    {
        $this->resolver = $resolver ?? Resolver::make();
        $this->configure($this->resolver);

        $this->items = $this->makeInternal();
    }

    /**
     * Configura esta colección
     *
     * @param \PlanB\DS\Resolver\Resolver $resolver
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function configure(Resolver $resolver): void
    {
    }

    /**
     * Devuelve el tipo de la colección
     *
     * @return null|\PlanB\Type\DataType\DataType
     */
    public function getInnerType(): ?DataType
    {
        return $this->resolver->getType();
    }

    /**
     * Crea la estructura de datos interna
     *
     * @return \DS\Collection
     */
    abstract protected function makeInternal(): \DS\Collection;

    /**
     * Named constructor.
     *
     * @param mixed[] $input
     *
     * @return mixed
     */
    abstract static public function make(iterable $input = []);
}
