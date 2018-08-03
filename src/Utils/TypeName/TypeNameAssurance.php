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

namespace PlanB\Utils\TypeName;

use PlanB\Utils\Assurance\Assurance;
use PlanB\ValueObject\Stringifable;

/**
 * Garantiza que un nombre de clase cumple con una serie de condiciones
 */
class TypeNameAssurance extends Assurance implements Stringifable
{

    /**
     * @var \PlanB\Utils\TypeName\TypeName
     */
    private $typName;

    /**
     * PathAssurance constructor.
     *
     * @param \PlanB\Utils\TypeName\TypeName $typeName
     */
    public function __construct(TypeName $typeName)
    {
        $this->typName = $typeName;
    }


    /**
     * Devuelve el objeto sujeto a evaluación
     *
     * @return mixed
     */
    protected function getEvaluatedObject(): object
    {
        return $this->typName;
    }

    /**
     * Crea una nueva instancia a partir de una cadena de texto
     *
     * @param string $typeName
     *
     * @return \PlanB\Utils\TypeName\TypeNameAssurance
     */
    public static function create(string $typeName): self
    {
        $typeName = TypeName::create($typeName);

        return new self($typeName);
    }


    /**
     * @inheritDoc
     */
    public function stringify(?string $format = null): string
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
}
