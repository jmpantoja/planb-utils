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

use PlanB\Type\Assurance\Exception\InvalidAssuranceMethodException;

/**
 * Representa al método final, obtenido mediante las transformaciónes oportunas
 */
class AssuranceMethod
{

    /**
     * @var object
     */
    private $object;

    /**
     * @var string
     */
    private $method;

    /**
     * @var bool
     */
    private $expected;


    /**
     * Crea una nueva instancia
     *
     * @param object $object
     * @param string $original
     *
     * @return \PlanB\Type\Assurance\AssuranceMethod
     */
    public static function make(object $object, string $original): self
    {
        return new static($object, $original);
    }


    /**
     * AssuranceMethod constructor.
     *
     * @param object $object
     * @param string $original
     */
    protected function __construct(object $object, string $original)
    {
        if (preg_match('/^(is|has)(not)?(.*)/i', $original, $matches)) {
            $inverted = $this->calculeInverted($matches);
            $this->initialize($object, $original, $inverted);
        }

        if (is_null($this->object)) {
            throw InvalidAssuranceMethodException::make($object, $original);
        }
    }

    /**
     * Calcula el nombre del método inverso al original
     *
     * @param string[] $matches
     *
     * @return string
     */
    protected function calculeInverted(array $matches): string
    {
        $prefix = $matches[1];
        $negation = '' === $matches[2] ? 'Not' : '';
        $name = $matches[3];

        $inverted = sprintf('%s%s%s', $prefix, $negation, $name);

        return $inverted;
    }

    /**
     * Inicializa la instancia calculando los valores para method y expected
     *
     * @param object $object
     * @param string $original
     * @param string $inverted
     */
    private function initialize(object $object, string $original, string $inverted): void
    {
        $this->initMethod($object, $original, true);
        $this->initMethod($object, $inverted, false);
    }

    /**
     * Inicializa la instancia con el método inverso, si procede
     *
     * @param object $object
     * @param string $method
     * @param bool   $expected
     */
    private function initMethod(object $object, string $method, bool $expected): void
    {
        if (!$this->mustBeInitialized($object, $method)) {
            return;
        }

        $this->object = $object;
        $this->method = $method;
        $this->expected = $expected;
    }

    /**
     * Indica si se dan las condiciones para que se inicialize con el nombre de método proporcionado
     *
     * @param object $object
     * @param string $inverted
     *
     * @return bool
     */
    private function mustBeInitialized(object $object, string $inverted): bool
    {
        return !is_object($this->object) && method_exists($object, $inverted);
    }


    /**
     * Devuelve la Closure lista para ejecutar
     *
     * @return callable
     */
    public function getCallable(): callable
    {
        return [$this->object, $this->method];
    }

    /**
     * Devuelve el valor que se espera que devuelva la closure
     *
     * @return bool
     */
    public function getExpected(): bool
    {
        return $this->expected;
    }
}
