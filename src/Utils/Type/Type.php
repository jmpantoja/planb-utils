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

namespace PlanB\Utils\Type;

use PlanB\Utils\TypeName\TypeName;
use PlanB\ValueObject\Stringifable;

/**
 * Representa al tipo de una variable
 */
class Type implements Stringifable
{
    /**
     * Type constructor.
     *
     * @param mixed $variable
     */
    public function __construct($variable)
    {
        $this->variable = $variable;
    }

    /**
     * Crea una nueva instancia
     *
     * @param mixed $variable
     *
     * @return \PlanB\Utils\Type\Type
     */
    public static function create($variable): self
    {
        return new self($variable);
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
     * Indica si la variable es una instancia de una clase o interfaz
     *
     * @param string ...$allowed
     *
     * @return bool
     */
    public function isTypeOf(string ...$allowed): bool
    {

        return at_least_one($allowed, function ($typeName) {

            $isNative = TypeName::create($typeName)->isNativeTypeName();

            if ($isNative) {
                $function = sprintf('is_%s', strtolower($typeName));

                return call_user_func($function, $this->variable);
            }

            return $this->isInstanceOf($typeName);
        });
    }


    /**
     * Devuelve el nombre del tipo, o de la clase
     *
     * @return string
     */
    public function getTypeName(): string
    {
        if (is_object($this->variable)) {
            return get_class($this->variable);
        }

        return gettype($this->variable);
    }

    /**
     * __toString alias
     *
     * @inheritdoc
     */
    public function stringify(?string $format = null): string
    {

        if ($this->isConvertableToString()) {
            return (string) $this->variable;
        }

        return $this->getTypeName();
    }

    /**
     * Indica si la variable se puede expresar como una cadena de texto
     *
     * @return bool
     */
    private function isConvertableToString(): bool
    {

        $isScalar = is_scalar($this->variable);
        $hasToStringMethod = method_exists($this->variable, '__toString');

        return $isScalar || $hasToStringMethod;
    }

    /**
     * Devuelve la cadena de texto
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->stringify();
    }
}
