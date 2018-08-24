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

/**
 * Representa la llamada a un método durante el proceso de assurance
 */
class AssuranceCall
{
    /**
     * @var object
     */
    private $object;

    /**
     * Crea una nueva instancia
     *
     * @param object $object
     *
     * @return \PlanB\Type\Assurance\AssuranceCall
     */
    public static function create(object $object): self
    {
        return new static($object);
    }

    /**
     * AssuranceCall constructor.
     *
     * @param object $object
     */
    protected function __construct(object $object)
    {
        $this->object = $object;
    }

    /**
     * Devuelve el objeto bajo evaluación
     *
     * @return object
     */
    public function getEvaluatedObject(): object
    {
        return $this->object;
    }

    /**
     * Ejecuta el método e indica si se cumple con el requisito
     *
     * @param string $name
     * @param mixed  ...$arguments
     *
     * @return bool
     */
    public function execute(string $name, ...$arguments): bool
    {

        $method = AssuranceMethod::create($this->object, $name);

        $callable = $method->getCallable();
        $expected = $method->getExpected();

        $response = call_user_func($callable, ...$arguments);

        return $expected === $response;
    }
}
