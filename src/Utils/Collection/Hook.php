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

namespace PlanB\Utils\Collection;

/**
 * Operación, personalizada
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
final class Hook
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
    private function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * Crea una operación personalizada que no hace nada
     *
     * @return \PlanB\Utils\Collection\Hook
     */
    public static function blank(): self
    {
        return new static(function (): void {
        });
    }

    /**
     * Crea una operación personalizada, a partir de un callable
     *
     * @param callable $callable
     *
     * @return \PlanB\Utils\Collection\Hook
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
     * @return \PlanB\Utils\Collection\Hook
     */
    public static function fromArray(array $callable): self
    {
        if (!is_callable($callable)) {
            return static::blank();
        }

        return static::fromCallable($callable);
    }

    /**
     * Ejecuta la operación
     *
     * @param \PlanB\Utils\Collection\KeyValue $pair
     * @param mixed|null                       $default
     *
     * @return mixed|null
     */
    public function execute(KeyValue $pair, $default = null)
    {
        $value = $pair->getValue();
        $key = $pair->getKey();

        $response = call_user_func($this->callable, $value, $key);

        return $response ?? $default;
    }
}
