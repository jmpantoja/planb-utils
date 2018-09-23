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

use PlanB\DS\Collection;
use PlanB\DS\Exception\InvalidArgumentException;
use PlanB\DS\Resolver\Input\FailedInput;
use PlanB\DS\Resolver\Input\IgnoredInput;
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
    protected function __construct(?Resolver $resolver = null)
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
     * @return \PlanB\DS\Collection
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function configure(Resolver $resolver): Collection
    {
        return $this;
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
     * Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Collection
     */
    protected function duplicate(iterable $input = []): Collection
    {
        return static::make($input, $this->resolver);
    }


    /**
     * Resuelve los valores antes de ser añadidos desde algun método
     *
     * @param callable $callback
     * @param mixed    ...$values
     */
    protected function hook(callable $callback, ...$values): void
    {

        $resolved = [];
        foreach ($values as $value) {
            $input = $this->resolver->resolve($value);

            if ($input instanceof IgnoredInput) {
                return;
            }

            if ($input instanceof FailedInput) {
                throw InvalidArgumentException::make($input);
            }

            $resolved[] = $input->getValue();
        }

        call_user_func($callback, ...$resolved);

        return;
    }
}
