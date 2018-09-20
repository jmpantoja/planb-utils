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
use PlanB\DS1\Exception\ReconfigurePopulatedCollectionException;
use PlanB\DS1\Resolver\Input\FailedInput;
use PlanB\DS1\Resolver\Input\IgnoredInput;
use PlanB\DS1\Resolver\Resolver;
use PlanB\Type\Value\Value;

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
     * @param mixed[] $input
     *
     * @return \PlanB\DS1\Collection
     */
    public static function make(iterable $input = []): Collection
    {
        return new static($input);
    }


    /**
     * @param string  $type
     * @param mixed[] $input
     *
     * @return \PlanB\DS1\Collection
     */
    public static function typed(string $type, iterable $input = []): Collection
    {
        $resolver = Resolver::typed($type);

        return new static($input, $resolver);
    }

    /**
     * @param mixed[] $input
     *
     * @return \PlanB\DS1\Collection
     */
    public static function like(iterable $input = []): Collection
    {
        $input = new \DS\Vector($input);

        if ($input->isEmpty()) {
            return static::make([]);
        }

        $first = $input->first();
        $type = Value::create($first)->stringify();

        return static::typed($type, $input);
    }

    /**
     * @inheritDoc
     */
    protected function __construct(iterable $input = [], ?Resolver $resolver = null)
    {
        $this->resolver = $resolver ?? Resolver::make();

        $this->hook(function (...$input): void {
            $this->items = $this->makeInternal($input);
        }, ...$input);
    }

    /**
     * Devuelve el tipo de la colección
     *
     * @return null|string
     */
    public function getInnerType(): ?string
    {
        return $this->resolver->getInnerType();
    }

    /**
     * Crea la estructura de datos interna
     *
     * @param mixed[] $input
     *
     * @return \DS\Collection
     */
    abstract protected function makeInternal(iterable $input): \DS\Collection;

    /**
     * Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS1\Collection
     */
    protected function duplicate(iterable $input = []): Collection
    {
        return new static($input, $this->resolver);
    }

    /**
     * Asocia un nuevo resolver
     *
     * @param \PlanB\DS1\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS1\Collection
     */
    public function bind(Resolver $resolver): Collection
    {
        $this->preventChangesOnFullyCollection();
        $this->resolver = $resolver;

        return $this;
    }

    /**
     * Añade un filtro a la cola
     *
     * @param callable $filter
     * @param int      $priority
     *
     * @return \PlanB\DS1\Collection
     */
    public function addFilter(callable $filter, int $priority = 0): self
    {
        $this->preventChangesOnFullyCollection();
        $this->resolver->addFilter($filter, $priority);

        return $this;
    }

    /**
     * Añade un filtro para un tipo determinado
     *
     * @param string   $type
     * @param callable $filter
     * @param int      $priority
     *
     * @return \PlanB\DS1\Collection
     */
    public function addTypedFilter(string $type, callable $filter, int $priority = 0): self
    {
        $this->preventChangesOnFullyCollection();
        $this->resolver->addTypedFilter($type, $filter, $priority);

        return $this;
    }

    /**
     * Añade un converter
     *
     * @param string   $type
     * @param callable $converter
     * @param int      $priority
     *
     * @return \PlanB\DS1\Collection
     */
    public function addConverter(string $type, callable $converter, int $priority = 0): self
    {
        $this->preventChangesOnFullyCollection();
        $this->resolver->addConverter($type, $converter, $priority);

        return $this;
    }


    /**
     * Añade un validator
     *
     * @param callable $validator
     * @param int      $priority
     *
     * @return \PlanB\DS1\Collection
     */
    public function addValidator(callable $validator, int $priority = 0): self
    {
        $this->preventChangesOnFullyCollection();
        $this->resolver->addValidator($validator, $priority);

        return $this;
    }

    /**
     * Añade un validator para un tipo determinado
     *
     * @param string   $type
     * @param callable $validator
     * @param int      $priority
     *
     * @return \PlanB\DS1\Collection
     */
    public function addTypedValidator(string $type, callable $validator, int $priority = 0): self
    {
        $this->preventChangesOnFullyCollection();
        $this->resolver->addTypedValidator($type, $validator, $priority);

        return $this;
    }

    /**
     * Añade un normalizer
     *
     * @param callable $normalizer
     * @param int      $priority
     *
     * @return \PlanB\DS1\Collection
     */
    public function addNormalizer(callable $normalizer, int $priority = 0): self
    {
        $this->preventChangesOnFullyCollection();
        $this->resolver->addNormalizer($normalizer, $priority);

        return $this;
    }

    /**
     * Añade un normalizer para un tipo determinado
     *
     * @param string   $type
     * @param callable $normalizer
     * @param int      $priority
     *
     * @return \PlanB\DS1\Collection
     */
    public function addTypedNormalizer(string $type, callable $normalizer, int $priority = 0): self
    {
        $this->preventChangesOnFullyCollection();
        $this->resolver->addTypedNormalizer($type, $normalizer, $priority);

        return $this;
    }

    /**
     * Lanza una excepción si se trata de modificar el resolver de  una colección que no está vacia
     */
    protected function preventChangesOnFullyCollection(): void
    {
        if ($this->isEmpty()) {
            return;
        }

        throw ReconfigurePopulatedCollectionException::make();
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
