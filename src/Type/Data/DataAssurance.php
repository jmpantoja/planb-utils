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

namespace PlanB\Type\Data;

use PlanB\Type\Assurance\Assurance;
use PlanB\Type\Stringifable;
use PlanB\Utils\Traits\Stringify;

/**
 * Assurance para Types
 */
class DataAssurance extends Assurance implements Stringifable
{
    use Stringify;

    /**
     * @var \PlanB\Utils\Type\Type
     */
    private $type;

    /**
     * ValueAssurance constructor.
     *
     * @param \PlanB\Utils\Type\Type $type
     */
    protected function __construct(Data $type)
    {
        $this->type = $type;
    }


    /**
     * Crea una nueva instancia
     *
     * @param mixed $variable
     *
     * @return \PlanB\Type\Data\DataAssurance
     */
    public static function make($variable): self
    {
        $type = Data::make($variable);

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

    /**
     * __toString alias
     *
     * @inheritdoc
     */
    public function stringify(): string
    {
        return $this->end()->stringify();
    }

    /**
     * Devuelve el nombre del tipo, decorado
     *
     * @return string
     */
    public function decorate(): string
    {
        return $this->end()->decorate();
    }
}
