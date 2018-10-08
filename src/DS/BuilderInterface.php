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

/**
 * Interfaz para resolver
 */
interface BuilderInterface
{


    /**
     * Asigna una colección de valores para incializar la colección
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\BuilderInterface
     */
    public function values(iterable $input): BuilderInterface;

    /**
     * Añade una regla
     *
     * @param callable $rule
     * @param string   ...$types
     *
     * @return \PlanB\DS\BuilderInterface
     */
    public function rule(callable $rule, string ...$types): BuilderInterface;


    /**
     * Añade un loader
     *
     * @param callable $loader
     * @param string   ...$types
     *
     * @return \PlanB\DS\BuilderInterface
     */
    public function loader(callable $loader, string ...$types): BuilderInterface;


    /**
     * Añade un filtro a la cola
     *
     * @param callable $filter
     * @param string   ...$types
     *
     * @return \PlanB\DS\BuilderInterface
     */
    public function filter(callable $filter, string ...$types): BuilderInterface;


    /**
     * Añade un converter
     *
     * @param callable $converter
     * @param string   ...$types
     *
     * @return \PlanB\DS\BuilderInterface
     */
    public function converter(callable $converter, string ...$types): BuilderInterface;


    /**
     * Añade un validator
     *
     * @param callable $validator
     * @param string   ...$types
     *
     * @return \PlanB\DS\BuilderInterface
     */
    public function validator(callable $validator, string ...$types): BuilderInterface;


    /**
     * Crea un vector
     *
     * @return mixed
     */
    public function vector();

    /**
     * Crea un deque
     *
     * @return mixed
     */
    public function deque();

    /**
     * Crea un stack
     *
     * @return mixed
     */
    public function stack();

    /**
     * Crea un queue
     *
     * @return mixed
     */
    public function queue();

    /**
     * Crea un prioriy queue
     *
     * @return mixed
     */
    public function priorityQueue();

    /**
     * Crea un map
     *
     * @return mixed
     */
    public function map();

    /**
     * Crea un set
     *
     * @return mixed
     */
    public function set();
}
