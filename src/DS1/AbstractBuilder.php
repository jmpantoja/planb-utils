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

namespace PlanB\DS1;

use PlanB\DS1\Resolver\Resolver;

/**
 * Clase Base para Builders
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class AbstractBuilder
{
    /**
     * @var mixed[]
     */
    private $input;

    /**
     * @var \PlanB\DS1\Resolver\Resolver
     */
    private $resolver;

    /**
     * AbstractBuilder named constructor.
     *
     * @return \PlanB\DS1\AbstractBuilder
     */
    public static function make(): AbstractBuilder
    {
        return new static();
    }

    /**
     * AbstractBuilder constructor.
     */
    protected function __construct()
    {
        $this->resolver = Resolver::make();
        $this->input = [];
    }

    /**
     * Devuelve el input
     *
     * @return mixed[]
     */
    protected function getInput(): iterable
    {
        return $this->input;
    }

    /**
     * Devuelve el resolver
     *
     * @return \PlanB\DS1\Resolver\Resolver
     */
    protected function getResolver(): Resolver
    {
        return $this->resolver;
    }


    /**
     * Asigna un tipo a la colección
     *
     * @param string $type
     *
     * @return \PlanB\DS1\AbstractBuilder
     */
    public function type(string $type): self
    {
        $this->resolver->setType($type);

        return $this;
    }

    /**
     * Asigna una colección de valores para incializar la colección
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS1\AbstractBuilder
     */
    public function values(iterable $input): self
    {
        $this->input = $input;

        return $this;
    }

    /**
     * Añade un filtro a la cola
     *
     * @param callable $filter
     * @param int      $priority
     *
     * @return \PlanB\DS1\AbstractBuilder
     */
    public function addFilter(callable $filter, int $priority = 0): self
    {
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
     * @return \PlanB\DS1\AbstractBuilder
     */
    public function addTypedFilter(string $type, callable $filter, int $priority = 0): self
    {
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
     * @return \PlanB\DS1\AbstractBuilder
     */
    public function addConverter(string $type, callable $converter, int $priority = 0): self
    {
        $this->resolver->addConverter($type, $converter, $priority);

        return $this;
    }


    /**
     * Añade un validator
     *
     * @param callable $validator
     * @param int      $priority
     *
     * @return \PlanB\DS1\AbstractBuilder
     */
    public function addValidator(callable $validator, int $priority = 0): self
    {
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
     * @return \PlanB\DS1\AbstractBuilder
     */
    public function addTypedValidator(string $type, callable $validator, int $priority = 0): self
    {
        $this->resolver->addTypedValidator($type, $validator, $priority);

        return $this;
    }

    /**
     * Añade un normalizer
     *
     * @param callable $normalizer
     * @param int      $priority
     *
     * @return \PlanB\DS1\AbstractBuilder
     */
    public function addNormalizer(callable $normalizer, int $priority = 0): self
    {
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
     * @return \PlanB\DS1\AbstractBuilder
     */
    public function addTypedNormalizer(string $type, callable $normalizer, int $priority = 0): self
    {
        $this->resolver->addTypedNormalizer($type, $normalizer, $priority);

        return $this;
    }


    /**
     * Crea el objeto
     *
     * @return mixed
     */
    abstract public function build();
}
