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

namespace PlanB\Type\Assurance;

use PlanB\Type\Assurance\Exception\AssertException;

/**
 * Proxy para capturar las llamadas a métodos assurance (isXXX, hasXXX, isNotXXX...)
 * y lanzar una excepción cuando no se cumple la condición requerida
 */
abstract class Assurance
{
    /**
     * Devuelve el objeto sujeto a evaluación
     *
     * @return mixed
     */
    abstract protected function getEvaluatedObject(): object;

    /**
     * Devuelve el objeto sujeto a evaluación
     *
     * getWrappedObject alias
     *
     * @return object
     */
    public function end(): object
    {
        return $this->getEvaluatedObject();
    }

    /**
     * Captura las llamadas a métodos
     *
     * @param string  $name
     * @param mixed[] $arguments
     *
     * @return \PlanB\Type\Assurance\Assurance
     */
    public function __call(string $name, array $arguments = []): Assurance
    {

        $wrapped = $this->getEvaluatedObject();

        $call = AssuranceCall::make($wrapped);

        if (!$call->execute($name, ...$arguments)) {
            throw AssertException::make($wrapped, $name, $arguments);
        }

        return $this;
    }
}
