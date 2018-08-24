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
     * @var null|object
     */
    private $object = null;

    /**
     * @var null|string
     */
    private $original = null;

    /**
     * @var null|string
     */
    private $inverted = null;

    /**
     * @var null|string
     */
    private $method = null;

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
    public static function create(object $object, string $original): self
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
            $this->object = $object;

            $prefix = $matches[1];
            $negation = '' === $matches[2] ? 'Not' : '';
            $name = $matches[3];

            $this->original = $original;
            $this->inverted = sprintf('%s%s%s', $prefix, $negation, $name);

            $this->initialize();
        }


        if (is_null($this->object)) {
            throw InvalidAssuranceMethodException::create($object, $original);
        }
    }

    /**
     * Inicializa la instancia calculando los valores para method y expected
     */
    private function initialize(): void
    {
        if (method_exists($this->object, $this->original)) {
            $this->method = $this->original;
            $this->expected = true;

            return;
        }

        if (method_exists($this->object, $this->inverted)) {
            $this->method = $this->inverted;
            $this->expected = false;

            return;
        }

        throw InvalidAssuranceMethodException::create($this->object, $this->original);
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
