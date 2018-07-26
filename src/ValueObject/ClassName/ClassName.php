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

namespace PlanB\ValueObject\ClassName;

use PlanB\ValueObject\Stringifable;

/**
 * Representa al nombre de una clase
 */
class ClassName implements Stringifable
{

    /**
     * @var string
     */
    private $className;

    /**
     * ClassName constructor.
     *
     * @param string $className
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * Crea una nueva instancia a partir de un nombre de clase
     *
     * @param string $className
     *
     * @return \PlanB\ValueObject\ClassName\ClassName
     */
    public static function fromString(string $className): self
    {
        return new self($className);
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
        return $this->className === $classOrInterfaceName;
    }

    /**
     * Indica si es un subtipo de otra clase, o interfaz
     *
     * @param string $classOrInterfaceName
     *
     * @return bool
     */
    public function isChildOf(string $classOrInterfaceName): bool
    {
        return is_subclass_of($this->className, $classOrInterfaceName);
    }

    /**
     * __toString alias
     *
     * @return string
     */
    public function stringify(): string
    {
        return $this->className;
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
