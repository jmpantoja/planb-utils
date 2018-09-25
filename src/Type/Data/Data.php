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

namespace PlanB\Type\Data;

use PlanB\DS\Vector\Vector;
use PlanB\Type\DataType\DataType;
use PlanB\Type\DataType\Type;
use PlanB\Type\Stringifable;
use PlanB\Utils\Traits\Stringify;

/**
 * Representa al tipo de una variable
 */
class Data implements Stringifable
{
    use Stringify;

    /**
     * @var mixed
     */
    private $variable;

    private const EQUIVALENT_TYPES_METHODS = [
        Type::SCALAR => 'isScalar',
        Type::NUMERIC => 'isNumeric',
        Type::COUNTABLE => 'isCountable',
        Type::CALLABLE => 'isCallable',
        Type::ITERABLE => 'isIterable',
        Type::OBJECT => 'isObject',
        Type::STRINGIFABLE => 'isConvertibleToString',
    ];

    /**
     * Input constructor.
     *
     * @param mixed $variable
     */
    protected function __construct($variable)
    {
        $this->variable = $variable;
    }

    /**
     * Crea una nueva instancia
     *
     * @param mixed $variable
     *
     * @return \PlanB\Type\Data\Data
     */
    public static function make($variable): self
    {
        return new static($variable);
    }

    /**
     * Indica si la variable es un array
     *
     * @return bool
     */
    public function isArray(): bool
    {
        return is_array($this->variable);
    }

    /**
     * Indica si la variable es un boolean
     *
     * @return bool
     */
    public function isBoolean(): bool
    {
        return is_bool($this->variable);
    }

    /**
     * Indica si la variable es callable
     *
     * @return bool
     */
    public function isCallable(): bool
    {
        return is_callable($this->variable);
    }

    /**
     * Indica si la variable es contable
     *
     * @return bool
     */
    public function isCountable(): bool
    {
        return is_array($this->variable) || $this->variable instanceof \Countable;
    }

    /**
     * Indica si la variable es un float
     *
     * @return bool
     */
    public function isFloat(): bool
    {
        return is_float($this->variable);
    }

    /**
     * Indica si la variable es un entero
     *
     * @return bool
     */
    public function isInteger(): bool
    {
        return is_integer($this->variable);
    }

    /**
     * Indica si la variable es iterable
     *
     * @return bool
     */
    public function isIterable(): bool
    {
        return is_iterable($this->variable);
    }


    /**
     * Indica si la variable es nula
     *
     * @return bool
     */
    public function isNull(): bool
    {
        return is_null($this->variable);
    }

    /**
     * Indica si la variable es un número
     *
     * @return bool
     */
    public function isNumeric(): bool
    {
        return is_numeric($this->variable);
    }

    /**
     * Indica si la variable es un objeto
     *
     * @return bool
     */
    public function isObject(): bool
    {
        return is_object($this->variable);
    }

    /**
     * Indica si la variable es un resource
     *
     * @return bool
     */
    public function isResource(): bool
    {
        return is_resource($this->variable);
    }

    /**
     * Indica si la variable es un scalar
     *
     * @return bool
     */
    public function isScalar(): bool
    {
        return is_scalar($this->variable);
    }


    /**
     * Indica si la variable es un string
     *
     * @return bool
     */
    public function isString(): bool
    {
        return is_string($this->variable);
    }


    /**
     * Indica si la variable es una instancia de una clase o interfaz
     *
     * @param string $classOrInterfaceName
     *
     * @return bool
     */
    public function isInstanceOf(string $classOrInterfaceName): bool
    {
        return $this->variable instanceof $classOrInterfaceName;
    }


    /**
     * Comprueba si la variable es de un tipo (o subtipo) de los permitidos
     *
     * @param string ...$allowed
     *
     * @return bool
     */
    public function isTypeOf(string ...$allowed): bool
    {

        $type = $this->getType();
        if ($type->isTypeOf(...$allowed)) {
            return true;
        }

        $equivalents = Vector::make($allowed)
            ->filter(function ($type) {
                return $this->isEquivalentTo($type);
            });


        return !$equivalents->isEmpty();
    }

    /**
     * Indica si el tipo de la variable es equivalente al dado
     *
     * @param string $type
     *
     * @return bool
     */
    private function isEquivalentTo(string $type): bool
    {
        $equivalents = self::EQUIVALENT_TYPES_METHODS;

        if (!isset($equivalents[$type])) {
            return false;
        }

        $method = $equivalents[$type];

        return call_user_func([$this, $method]);
    }

    /**
     * Devuelve el DataType
     *
     * @return \PlanB\Type\DataType\DataType
     */
    public function getType(): DataType
    {
        if (is_object($this->variable)) {
            $typeName = get_class($this->variable);

            return DataType::make($typeName);
        }

        $typeName = gettype($this->variable);

        return DataType::make($typeName);
    }


    /**
     * Indica si la variable se puede expresar como una cadena de texto
     *
     * @return bool
     */
    public function isConvertibleToString(): bool
    {

        $isScalar = is_scalar($this->variable);
        $isStringifable = $this->variable instanceof Stringifable;

        if ($isScalar || $isStringifable) {
            return true;
        }

        $hasToStringMethod = method_exists($this->variable, '__toString');

        return $hasToStringMethod;
    }


    /**
     * __toString alias
     *
     * @return string
     */
    public function stringify(): string
    {
        return $this->getType()->stringify();
    }

    /**
     * Devuelve el nombre del tipo, decorado
     *
     * @return string
     */
    public function decorate(): string
    {

        $typeName = $this->getType()->stringify();

        if ($this->isCountable()) {
            $typeName = sprintf('%s(%s)', $typeName, count($this->variable));
        }

        if (!$this->isConvertibleToString()) {
            return sprintf('[%s]', $typeName);
        }

        $variable = (string) $this->variable;

        if (!$this->isNumeric()) {
            $variable = sprintf('"%s"', $variable);
        }

        return sprintf('[%s: %s]', $typeName, $variable);
    }
}
