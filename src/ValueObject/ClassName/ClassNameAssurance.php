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

namespace PlanB\ValueObject\ClassName;

use PlanB\ValueObject\ClassName\Exception\InvalidClassNameExpcetion;
use PlanB\ValueObject\Stringifable;

/**
 * Garantiza que un nombre de clase cumple con una serie de condiciones
 */
class ClassNameAssurance implements Stringifable
{

    /**
     * @var \PlanB\ValueObject\ClassName\ClassName
     */
    private $className;

    /**
     * PathAssurance constructor.
     *
     * @param \PlanB\ValueObject\ClassName\ClassName $className
     */
    public function __construct(ClassName $className)
    {
        $this->className = $className;
    }

    /**
     * Crea una nueva instancia a partir de una cadena de texto
     *
     * @param string $className
     *
     * @return \PlanB\ValueObject\ClassName\ClassNameAssurance
     */
    public static function fromString(string $className): self
    {
        $path = ClassName::fromString($className);

        return new self($path);
    }

    /**
     * Devuelve la ruta
     *
     * @return \PlanB\ValueObject\Path\Path
     */
    public function end(): ClassName
    {
        return $this->className;
    }

    /**
     * @inheritDoc
     */
    public function stringify(): string
    {
        return $this->end()->stringify();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->stringify();
    }

    /**
     * Comprueba que la clase es hija de otra, o lanza una excepción en caso contrario
     *
     * @param string $classOrInterfaceName
     *
     * @return \PlanB\ValueObject\ClassName\ClassNameAssurance
     */
    public function isChildOf(string $classOrInterfaceName): self
    {
        if (!$this->className->isChildOf($classOrInterfaceName)) {
            throw InvalidClassNameExpcetion::notChildOf($this->className, $classOrInterfaceName);
        }

        return $this;
    }
}
