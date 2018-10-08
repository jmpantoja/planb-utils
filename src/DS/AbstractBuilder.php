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

namespace PlanB\DS;

use PlanB\DS\Resolver\Resolver;

/**
 * Clase Base para Builders
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class AbstractBuilder
{
    /**
     * @var mixed[]\Traversable
     */
    private $input;

    /**
     * @var \PlanB\DS\Resolver\Resolver
     */
    private $resolver;

    /**
     * AbstractBuilder named constructor.
     *
     * @return mixed
     */
    abstract public static function make();

    /**
     * AbstractBuilder constructor.
     *
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     */
    protected function __construct(?Resolver $resolver = null)
    {
        $this->resolver = $resolver ?? Resolver::make();
        $this->input = [];
    }

    /**
     * Devuelve el input
     *
     * @return mixed[]|\Traversable
     */
    protected function getInput(): iterable
    {
        return $this->input;
    }

    /**
     * Devuelve el resolver
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    protected function getResolver(): Resolver
    {
        return $this->resolver;
    }


    /**
     * Asigna una colección de valores para incializar la colección
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\AbstractBuilder
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
     * @param string   ...$types
     *
     * @return \PlanB\DS\AbstractBuilder
     */
    public function filter(callable $filter, string ...$types): self
    {
        $this->resolver->filter($filter, ...$types);

        return $this;
    }

    /**
     * Añade un converter
     *
     * @param callable $converter
     * @param string   ...$types
     *
     * @return \PlanB\DS\AbstractBuilder
     */
    public function converter(callable $converter, string ...$types): self
    {
        $this->resolver->converter($converter, ...$types);

        return $this;
    }


    /**
     * Añade un validator
     *
     * @param callable $validator
     * @param string   ...$types
     *
     * @return \PlanB\DS\AbstractBuilder
     */
    public function validator(callable $validator, string ...$types): self
    {
        $this->resolver->validator($validator, ...$types);

        return $this;
    }


    /**
     * Añade una regla
     *
     * @param callable $rule
     * @param string   ...$types
     *
     * @return \PlanB\DS\AbstractBuilder
     */
    public function rule(callable $rule, string ...$types): self
    {
        $this->resolver->rule($rule, ...$types);

        return $this;
    }

    /**
     * Asigna la función que debe invocarse cuando se lanza una excepción,
     * con el fin de poder lanzar otra personalizada
     *
     * @param callable $callback
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function catcher(callable $callback): self
    {
        $this->resolver->catcher($callback);

        return $this;
    }

    /**
     * Crea el objeto
     *
     * @return mixed
     */
    abstract public function build();
}
