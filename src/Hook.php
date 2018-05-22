<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PlanB\Type;

/**
 * Operación, personalizada
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class Hook
{
    /**
     * @var callable
     */
    private $callable;

    /**
     * Operation constructor.
     *
     * @param callable|null $callable
     */
    protected function __construct(?callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * Crea una operación personalizada que no hace nada
     *
     * @return \PlanB\Type\Hook
     */
    public static function default(): self
    {
        return new static(null);
    }

    /**
     * Crea una operación personalizada, a partir de un callable
     *
     * @param callable $callable
     *
     * @return \PlanB\Type\Hook
     */
    public static function fromCallable(callable $callable): self
    {
        return new static($callable);
    }


    /**
     * Crea una operación personalizada, a partir de un array
     *
     * @param mixed[] $callable
     *
     * @return \PlanB\Type\Hook
     */
    public static function fromArray(array $callable): self
    {
        if (!is_callable($callable)) {
            return static::default();
        }

        return static::fromCallable($callable);
    }

    /**
     * Ejecuta la operación
     *
     * @param \PlanB\Type\KeyValue $pair
     * @param null                 $default
     *
     * @return mixed|null
     */
    public function execute(KeyValue $pair, $default = null)
    {

        if (is_null($this->callable)) {
            return $default;
        }

        $value = $pair->getValue();
        $key = $pair->getKey();

        return call_user_func($this->callable, $value, $key);
    }
}