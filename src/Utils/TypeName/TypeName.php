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

namespace PlanB\Utils\TypeName;

use PlanB\DS\ItemList\ItemList;
use PlanB\ValueObject\Stringifable;

/**
 * Representa al nombre de una clase
 */
class TypeName implements Stringifable
{

    /**
     * @var string
     */
    private $typeName;

    /**
     * ClassName constructor.
     *
     * @param string $typeName
     */
    public function __construct(string $typeName)
    {
        $this->typeName = $typeName;
    }

    /**
     * Crea una nueva instancia a partir de un nombre de clase
     *
     * @param string $typeName
     *
     * @return \PlanB\Utils\TypeName\TypeName
     */
    public static function create(string $typeName): self
    {
        return new self($typeName);
    }


    /**
     * Cambia el valor del typename (inmutable)
     *
     * @param string $typeName
     *
     * @return \PlanB\Utils\TypeName\TypeName
     */
    public function overwite(string $typeName): self
    {
        return self::create($typeName);
    }

    /**
     * Devuelve un array con los nombres de los tipos nativos
     *
     * @return string[]
     */
    public static function getNativeTypes(): array
    {
        return [
            'array',
            'bool',
            'callable',
            'countable',
            'double',
            'float',
            'int',
            'integer',
            'iterable',
            'long',
            'null',
            'numeric',
            'object',
            'real',
            'resource',
            'scalar',
            'string',
        ];
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
        return $this->typeName === $classOrInterfaceName;
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
        return is_subclass_of($this->typeName, $classOrInterfaceName);
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

        $found = ItemList::create($allowed)
            ->search(function ($type) {
                return $this->isClassOf($type);
            });

        return boolval($found);
    }

    /**
     * __toString alias
     *
     * @inheritdoc
     */
    public function stringify(?string $format = null): string
    {
        return $this->typeName;
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

    /**
     * Indica si es un nombre de clase
     *
     * @return bool
     */
    public function isClassName(): bool
    {
        return class_exists($this->typeName);
    }

    /**
     * Indica si es un nombre de interfaz
     *
     * @return bool
     */
    public function isInterfaceName(): bool
    {
        return interface_exists($this->typeName);
    }


    /**
     * Indica si es un nombre de clase o interfaz
     *
     * @return bool
     */
    public function isClassOrInterfaceName(): bool
    {
        return $this->isClassName() || $this->isInterfaceName();
    }

    /**
     * Indica si es un nombre de rasgo
     *
     * @return bool
     */
    public function isTraitName(): bool
    {
        return trait_exists($this->typeName);
    }

    /**
     * Indica si es un nombre de rasgo
     *
     * @return bool
     */
    public function isNativeTypeName(): bool
    {
        $natives = self::getNativeTypes();

        return in_array($this->typeName, $natives);
    }

    /**
     * Indica si es un nombre de tipo nativo, de clase, de rasgo o de interfaz
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isNativeTypeName() || $this->isTraitName() || $this->isInterfaceName() || $this->isClassName();
    }
}
