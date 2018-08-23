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

namespace PlanB\Utils\Type;

use PlanB\Utils\Assurance\Assurance;
use PlanB\Type\Stringifable;

/**
 * Assurance para Types
 */
class TypeAssurance extends Assurance implements Stringifable
{

    /**
     * @var \PlanB\Utils\Type\Type
     */
    private $type;

    /**
     * TypeAssurance constructor.
     *
     * @param \PlanB\Utils\Type\Type $type
     */
    protected function __construct(Type $type)
    {
        $this->type = $type;
    }

    /**
     * __toString alias
     *
     * @inheritdoc
     */
    public function stringify(?string $format = null): string
    {
        return $this->end()->stringify($format);
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
     * Crea una nueva instancia
     *
     * @param mixed $variable
     *
     * @return \PlanB\Utils\Type\TypeAssurance
     */
    public static function create($variable): self
    {
        $type = Type::create($variable);

        return new static($type);
    }

    /**
     * Devuelve el objeto que vamos a evaluar
     *
     * @return object
     */
    protected function getEvaluatedObject(): object
    {
        return $this->type;
    }
}
