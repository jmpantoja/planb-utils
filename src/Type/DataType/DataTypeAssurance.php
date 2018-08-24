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

/**
 * Garantiza que un nombre de clase cumple con una serie de condiciones
 */
class DataTypeAssurance extends Assurance implements Stringifable
{

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
    public static function create(string $type): self
    {
        $type = DataType::create($type);

        return new static($type);
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
}
