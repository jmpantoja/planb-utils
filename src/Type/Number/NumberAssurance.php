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

namespace PlanB\Type\Number;

use PlanB\Type\Assurance\Assurance;

/**
 * Comprueba que un número cumpla con  una serie de condiciones
 *
 * @method bool isPositive()
 * @method bool isNegative()
 * @method bool isInteger()
 * @method bool isDouble()
 *
 * @method bool isNotPositive()
 * @method bool isNotNegative()
 * @method bool isNotInteger()
 * @method bool isNotDouble()
 */
class NumberAssurance extends Assurance
{

    /**
     * @var \PlanB\Type\Number\Number
     */
    private $number;

    /**
     * NumberAssurance constructor.
     *
     * @param \PlanB\Type\Number\Number $number
     */
    protected function __construct(Number $number)
    {
        $this->number = $number;
    }

    /**
     * NumberAssurance named constructor.
     *
     * @param mixed $number
     *
     * @return \PlanB\Type\Number\NumberAssurance
     */
    public static function make($number): NumberAssurance
    {
        $number = Number::make($number);

        return new static($number);
    }

    /**
     * Devuelve el objeto sujeto a evaluación
     *
     * @return mixed
     */
    protected function getEvaluatedObject(): object
    {
        return $this->number;
    }
}
