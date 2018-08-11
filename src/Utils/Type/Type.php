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

use PlanB\DS\ItemList\ItemList;
use PlanB\Utils\TypeName\TypeName;
use PlanB\ValueObject\Stringifable;

/**
 * Representa al tipo de una variable
 */
class Type implements Stringifable
{

    public const ARRAY = 'array';
    public const BOOLEAN = 'boolean';
    public const CALLABLE = 'callable';
    public const COUNTABLE = 'countable';
    public const FLOAT = 'float';
    public const INTEGER = 'integer';
    public const ITERABLE = 'iterable';
    public const NULL = 'null';
    public const NUMERIC = 'numeric';
    public const OBJECT = 'object';
    public const RESOURCE = 'resource';
    public const SCALAR = 'scalar';
    public const STRING = 'string';


    private const EQUIVALENT_TYPES_METHODS = [
        'scalar' => 'isScalar',
        'numeric' => 'isNumeric',
        'countable' => 'isCountable',
        'callable' => 'isCallable',
        'iterable' => 'isIterable',
        'object' => 'isObject',
    ];

    /**
     * Type constructor.
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
     * @return \PlanB\Utils\Type\Type
     */
    public static function create($variable): self
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

        $typeName = $this->getTypeName();
        if ($typeName->isTypeOf(...$allowed)) {
            return true;
        }


        return (bool) ItemList::create($allowed)
            ->search(function ($type) {
                return $this->isEquivalentTo($type);
            }, $allowed);
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
     * Devuelve el TypeName
     *
     * @return string
     */
    public function getTypeName(): TypeName
    {
        if (is_object($this->variable)) {
            $typeName = get_class($this->variable);

            return TypeName::create($typeName);
        }

        $typeName = gettype($this->variable);

        return TypeName::create($typeName);
    }

    /**
     * __toString alias
     *
     * @inheritdoc
     */
    public function stringify(?string $format = null): string
    {

        $typeName = $this->getTypeName()->stringify();

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


    /**
     * Indica si la variable se puede expresar como una cadena de texto
     *
     * @return bool
     */
    public function isConvertibleToString(): bool
    {

        $isScalar = is_scalar($this->variable);
        $hasToStringMethod = method_exists($this->variable, '__toString');

        return $isScalar || $hasToStringMethod;
    }

    /**
     * Devuelve el valor como una cadena de texto
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->stringify();
    }
}
