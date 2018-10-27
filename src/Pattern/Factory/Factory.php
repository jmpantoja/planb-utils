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

use PlanB\Type\Data\DataAssurance;
use PlanB\Type\DataType\Type;

/**
 * Clase Base para crear factorias
 */
abstract class Factory
{
    /**
     * @var \PlanB\Pattern\Factory\FactoryMethodList
     */
    private $methods;

    /**
     * Evalua una condición y devuelve el valor apropiado
     *
     * @param mixed ...$arguments
     *
     * @return mixed
     */
    public static function evaluate(...$arguments): DataAssurance
    {
        $response = (new static())
            ->create(...$arguments);

        return ensure_data($response);
    }

    /**
     * Factory constructor.
     */
    protected function __construct()
    {
        $this->methods = FactoryMethodList::make();
        $this->configure();
    }

    /**
     * Registra métodos en este factory
     *
     * @return void
     */
    abstract protected function configure(): void;

    /**
     * Registra un método
     *
     * @param string|mixed[] $method
     */
    public function register($method): void
    {
        $data = ensure_data($method)
            ->isTypeOf(Type::STRING, Type::ARRAY, Type::CALLABLE)
            ->end();

        if ($data->isString()) {
            $method = [$this, $method];
        }

        $this->methods->push($method);
    }

    /**
     * Crea un valor para ser devuelto
     *
     * @param mixed ...$arguments
     *
     * @return mixed
     */
    protected function create(...$arguments)
    {
        $response = null;
        while ($method = $this->methods->next($response)) {
            $response = call_user_func($method, ...$arguments);
        }

        return $response;
    }
}
