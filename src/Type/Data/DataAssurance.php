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

namespace PlanB\Type\Data;

use PlanB\Type\Assurance\Assurance;

/**
 * Assurance para Types
 *
 * @method bool isArray()
 * @method bool isBoolean()
 * @method bool isCallable()
 * @method bool isCountable()
 * @method bool isThrowable()
 * @method bool isFloat()
 * @method bool isInteger()
 * @method bool isIterable()
 * @method bool isNull()
 * @method bool isNumeric()
 * @method bool isObject()
 * @method bool isResource()
 * @method bool isScalar()
 * @method bool isString()
 * @method bool isInstanceOf(string $classOrInterfaceName)
 * @method bool isTypeOf(string ...$allowed)
 * @method bool isConvertibleToString()
 * @method bool isHashable()
 *
 * @method bool isNotArray()
 * @method bool isNotBoolean()
 * @method bool isNotCallable()
 * @method bool isNotCountable()
 * @method bool isNotThrowable()
 * @method bool isNotFloat()
 * @method bool isNotInteger()
 * @method bool isNotIterable()
 * @method bool isNotNull()
 * @method bool isNotNumeric()
 * @method bool isNotObject()
 * @method bool isNotResource()
 * @method bool isNotScalar()
 * @method bool isNotString()
 * @method bool isNotInstanceOf(string $classOrInterfaceName)
 * @method bool isNotTypeOf(string ...$allowed)
 * @method bool isNotConvertibleToString()
 * @method bool isNotHashable()
 */
class DataAssurance extends Assurance
{
    /**
     * @var \PlanB\Type\Data\Data
     */
    private $data;

    /**
     * ValueAssurance constructor.
     *
     * DataAssurance constructor.
     *
     * @param \PlanB\Type\Data\Data $data
     */
    protected function __construct(Data $data)
    {
        $this->data = $data;
    }


    /**
     * Crea una nueva instancia
     *
     * @param mixed $variable
     *
     * @return \PlanB\Type\Data\DataAssurance
     */
    public static function make($variable): self
    {
        if ($variable instanceof Data) {
            return new static($variable);
        }

        $data = Data::make($variable);

        return new static($data);
    }

    /**
     * Devuelve el objeto que vamos a evaluar
     *
     * @return object
     */
    protected function getEvaluatedObject(): object
    {
        return $this->data;
    }
}
