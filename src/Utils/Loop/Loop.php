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

namespace PlanB\Utils\Loop;

/**
 * Simplificación de un bucle
 */
class Loop implements \Iterator
{
    /**
     * @var mixed[]
     */
    private $input;

    /**
     * @var \Generator
     */
    private $seed;

    /**
     * @var callable
     */
    private $each;

    /**
     * @var callable
     */
    private $before;

    /**
     * @var callable
     */
    private $after;


    /**
     * Loop named constructor.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\Utils\Loop\Loop
     */
    public static function make(iterable $input): self
    {
        return new static($input);
    }

    /**
     * Loop constructor.
     *
     * @param mixed[] $input
     */
    protected function __construct(iterable $input)
    {
        $this->input = $input;
        $this->rewind();
    }


    /**
     * @inheritdoc
     */
    public function current()
    {
        return $this->seed->current();
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        $this->seed->next();
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        return $this->seed->key();
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return $this->seed->valid();
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        $this->seed = $this->seed();
    }

    /**
     * Crea un generador
     *
     * @return \Generator|void
     */
    private function seed()
    {
        foreach ($this->input as $key => $value) {
            if (!$this->call($this->before, $value, $key)) {
                return;
            }

            yield $key => $value;

            if (!$this->call($this->after, $value, $key)) {
                return;
            }
        }
    }

    /**
     * Se ejecuta una vez por cada elemento
     *
     * @param callable $each
     *
     * @return \PlanB\Utils\Loop\Loop
     */
    public function each(callable $each): self
    {
        $this->each = $each;

        return $this;
    }

    /**
     * Lanza la ejecución
     */
    public function run(): void
    {
        foreach ($this->seed as $key => $value) {
            $this->call($this->each, $value, $key);
        }
    }

    /**
     * Evalua la condición de salida antes de ejecutar el método each
     *
     * @param callable $before
     *
     * @return $this
     */
    public function before(callable $before)
    {
        $this->before = $before;

        return $this;
    }

    /**
     *  Evalua la condición de salida despues de ejecutar el método each
     *
     * @param callable $after
     *
     * @return $this
     */
    public function after(callable $after)
    {
        $this->after = $after;

        return $this;
    }

    /**
     * Ejecuta un callable
     *
     * @param callable|null $method
     * @param mixed         ...$arguments
     *
     * @return bool|mixed
     */
    private function call(?callable $method, ...$arguments)
    {
        if (is_null($method)) {
            return true;
        }

        return call_user_func($method, ...$arguments);
    }
}
