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

namespace PlanB\DS1\Traits;

use PlanB\DS1\Collection;
use PlanB\DS1\Exception\InvalidArgumentException;
use PlanB\DS1\Resolver\Input\FailedInput;
use PlanB\DS1\Resolver\Input\IgnoredInput;
use PlanB\DS1\Resolver\Resolver;
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
     * @var \PlanB\DS1\Resolver\Resolver
     */
    private $resolver;




    /**
     * @inheritDoc
     */
    protected function __construct(?Resolver $resolver = null)
    {
        $this->resolver = $resolver ?? Resolver::make();
        $this->items = $this->makeInternal();
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
     * @return \PlanB\DS1\Collection
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
