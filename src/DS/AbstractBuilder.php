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
use PlanB\DS\Resolver\ResolverInterface;

/**
 * Clase Base para Builders
 */
abstract class AbstractBuilder implements BuilderInterface
{
    /**
     * @var mixed[]\Traversable
     */
    private $input;

    /**
     * @var \PlanB\DS\Resolver\ResolverInterface
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
     * @param null|\PlanB\DS\Resolver\ResolverInterface $resolver
     */
    protected function __construct(?ResolverInterface $resolver = null)
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
     * @return \PlanB\DS\Resolver\ResolverInterface
     */
    protected function getResolver(): ResolverInterface
    {
        return $this->resolver;
    }


    /**
     * Asigna una colección de valores para incializar la colección
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\BuilderInterface
     */
    public function values(iterable $input): BuilderInterface
    {
        $this->input = $input;

        return $this;
    }


    /**
     * Añade una regla
     *
     * @param callable $rule
     * @param string   ...$types
     *
     * @return \PlanB\DS\BuilderInterface
     */
    public function rule(callable $rule, string ...$types): BuilderInterface
    {
        $this->resolver->rule($rule, ...$types);

        return $this;
    }

    /**
     * Añade un loader
     *
     * @param callable $loader
     * @param string   ...$types
     *
     * @return \PlanB\DS\BuilderInterface
     */
    public function loader(callable $loader, string ...$types): BuilderInterface
    {
        $this->resolver->loader($loader, ...$types);

        return $this;
    }


    /**
     * Añade un filtro a la cola
     *
     * @param callable $filter
     * @param string   ...$types
     *
     * @return \PlanB\DS\BuilderInterface
     */
    public function filter(callable $filter, string ...$types): BuilderInterface
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
     * @return \PlanB\DS\BuilderInterface
     */
    public function converter(callable $converter, string ...$types): BuilderInterface
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
     * @return \PlanB\DS\BuilderInterface
     */
    public function validator(callable $validator, string ...$types): BuilderInterface
    {
        $this->resolver->validator($validator, ...$types);

        return $this;
    }
}
