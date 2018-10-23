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

namespace PlanB\Pattern\Factory;

use PlanB\DS\Queue\AbstractQueue;
use PlanB\DS\Resolver\ResolverInterface;
use PlanB\Pattern\Factory\Exception\FactoryMethodException;
use PlanB\Type\DataType\Type;

/**
 * Lista de métodos que componen un Factory
 */
class FactoryMethodList extends AbstractQueue
{

    /**
     * FactoryMethodList named constructor.
     *
     * @return \PlanB\Pattern\Factory\FactoryMethodList
     */
    public static function make(): self
    {
        return new static([]);
    }

    /**
     * Configura esta colección
     *
     * @param \PlanB\DS\Resolver\ResolverInterface $resolver
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function configure(ResolverInterface $resolver): void
    {
        $resolver->type(Type::CALLABLE)
            ->validator(function (array $method) {
                return $this->validate($method);
            }, Type::ARRAY);
    }

    /**
     * Indica si un array es un correcto
     *
     * @param mixed[] $method
     *
     * @return bool
     *
     * @throws \Exception
     */
    private function validate(array $method): bool
    {
        if (!is_callable($method)) {
            throw FactoryMethodException::fromArray($method);
        }

        return true;
    }

    /**
     * Devuelve el siguiente elemento en la iteracción
     *
     * @param mixed $response
     *
     * @return callable|null
     */
    public function next($response): ?callable
    {
        if ($this->isEmpty()) {
            return null;
        }

        if (!is_null($response)) {
            return null;
        }

        return $this->pop();
    }
}
