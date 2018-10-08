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

namespace PlanB\Type\DataType;

use PlanB\Type\Data\Data;
use PlanB\Type\Stringifable;
use PlanB\Utils\Traits\Stringify;

/**
 * Representa al nombre de una clase
 */
class DataType implements Stringifable
{
    use Stringify;
    /**
     * @var string
     */
    private $type;


    /**
     * ClassName constructor.
     *
     * @param string $type
     */
    private const EQUIVALENTS = [
        'bool' => Type::BOOLEAN,
        'float' => Type::DOUBLE,
        'real' => Type::DOUBLE,
        'int' => Type::INTEGER,
        'long' => Type::INTEGER,
    ];

    /**
     * DataType constructor.
     *
     * @param string $type
     */
    protected function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Crea una nueva instancia a partir de un nombre de clase
     *
     * @param string $type
     *
     * @return \PlanB\Type\DataType\DataType
     */
    public static function make(string $type): self
    {
        if (isset(self::EQUIVALENTS[$type])) {
            $type = self::EQUIVALENTS[$type];
        }

        return new static($type);
    }

    /**
     * Indica si la clase es la misma
     *
     * @param string $classOrInterfaceName
     *
     * @return bool
     */
    public function isSameOf(string $classOrInterfaceName): bool
    {
        return $this->type === $classOrInterfaceName;
    }

    /**
     * Indica si es un subtipo de una clase o interfaz
     *
     * Para nombres de clase iguales devuelve false
     *
     * @param string $classOrInterfaceName
     *
     * @return bool
     */
    public function isChildOf(string $classOrInterfaceName): bool
    {
        return is_subclass_of($this->type, $classOrInterfaceName);
    }

    /**
     * Indica si es un subtipo de una clase o interfaz
     *
     * Para nombres de clase iguales devuelve true
     *
     * @param string $classOrInterfaceName
     *
     * @return bool
     */
    public function isClassOf(string $classOrInterfaceName): bool
    {
        return $this->isSameOf($classOrInterfaceName) || $this->isChildOf($classOrInterfaceName);
    }

    /**
     * Indica si pertenece a alguno de los tipos dados
     *
     * @param string ...$allowed
     *
     * @return bool
     */
    public function isTypeOf(string ...$allowed): bool
    {

        $allowed = new \DS\Set($allowed);

        $found = $allowed
            ->filter(function ($type) {
                return $this->isClassOf($type);
            });


        return !$found->isEmpty();
    }


    /**
     * Indica si es un nombre de clase
     *
     * @return bool
     */
    public function isClass(): bool
    {
        return class_exists($this->type);
    }

    /**
     * Indica si es un nombre de interfaz
     *
     * @return bool
     */
    public function isInterface(): bool
    {
        return interface_exists($this->type);
    }


    /**
     * Indica si es un nombre de clase o interfaz
     *
     * @return bool
     */
    public function isClassOrInterface(): bool
    {
        return $this->isClass() || $this->isInterface();
    }

    /**
     * Indica si es un nombre de clase, de interfaz o de trait
     *
     * @return bool
     */
    public function isClassOrInterfaceOrTrait(): bool
    {
        return $this->isClassOrInterface() || $this->isTrait();
    }


    /**
     * Indica si es un nombre de rasgo
     *
     * @return bool
     */
    public function isTrait(): bool
    {
        return trait_exists($this->type);
    }

    /**
     * Indica si es un nombre de rasgo
     *
     * @return bool
     */
    public function isNative(): bool
    {
        return Type::has($this->type);
    }

    /**
     * Indica si es un nombre de tipo nativo, de clase, de rasgo o de interfaz
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isNative() || $this->isClassOrInterfaceOrTrait();
    }

    /**
     * Indica si el valor pasado es de este tipo
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isTheTypeOf($value): bool
    {
        return Data::make($value)->isTypeOf($this->stringify());
    }

    /**
     * __toString alias
     *
     * @inheritdoc
     */
    public function stringify(): string
    {
        return $this->type;
    }
}
