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

namespace PlanB\Type\DataType;

use PlanB\Type\Assurance\Assurance;
use PlanB\Type\Stringifable;
use PlanB\Utils\Traits\Stringify;

/**
 * Garantiza que un nombre de clase cumple con una serie de condiciones
 *
 * @method bool isSameOf(string $classOrInterfaceName)
 * @method bool isChildOf(string $classOrInterfaceName)
 * @method bool isClassOf(string $classOrInterfaceName)
 * @method bool isTypeOf(string ...$allowed)
 * @method bool isClass()
 * @method bool isInterface()
 * @method bool isClassOrInterface()
 * @method bool isClassOrInterfaceOrTrait()
 * @method bool isTrait()
 * @method bool isNative()
 * @method bool isValid()
 * @method bool isTheTypeOf($value)
 *
 * @method bool isNotSameOf(string $classOrInterfaceName)
 * @method bool isNotChildOf(string $classOrInterfaceName)
 * @method bool isNotClassOf(string $classOrInterfaceName)
 * @method bool isNotTypeOf(string ...$allowed)
 * @method bool isNotClass()
 * @method bool isNotInterface()
 * @method bool isNotClassOrInterface()
 * @method bool isNotClassOrInterfaceOrTrait()
 * @method bool isNotTrait()
 * @method bool isNotNative()
 * @method bool isNotValid()
 * @method bool isNotTheTypeOf($value)
 */
class DataTypeAssurance extends Assurance implements Stringifable
{
    use Stringify;

    /**
     * @var \PlanB\Type\DataType\DataType
     */
    private $type;

    /**
     * PathAssurance constructor.
     *
     * @param \PlanB\Type\DataType\DataType $type
     */
    protected function __construct(DataType $type)
    {
        $this->type = $type;
    }


    /**
     * Devuelve el objeto sujeto a evaluación
     *
     * @return mixed
     */
    protected function getEvaluatedObject(): object
    {
        return $this->type;
    }

    /**
     * Crea una nueva instancia a partir de una cadena de texto
     *
     * @param string $type
     *
     * @return \PlanB\Type\DataType\DataTypeAssurance
     */
    public static function make(string $type): self
    {
        $type = DataType::make($type);

        return new static($type);
    }


    /**
     * @inheritDoc
     */
    public function stringify(): string
    {
        return $this->end()->stringify();
    }
}
