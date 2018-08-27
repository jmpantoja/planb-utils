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

/**
 * Representa a un número
 */
class Number
{
    /**
     * @var \PlanB\Type\Number\double|int
     */
    private $number;

    /**
     * Number named constructor.
     *
     * @param mixed $number
     *
     * @return \PlanB\Type\Number\Number
     */
    public static function create($number): self
    {
        return new static($number);
    }

    /**
     * Number constructor.
     *
     * @param mixed $number
     */
    protected function __construct($number)
    {
        ensure_value($number)->isNumeric();

        $this->number = $number;
    }

    /**
     * Number empty constructor.
     *
     * @return \PlanB\Type\Number\Number
     */
    public static function zero(): self
    {
        return new static(0);
    }

    /**
     * Devuelve el valor como un entero
     *
     * @return int
     */
    public function toInteger(): int
    {
        return intval($this->number);
    }

    /**
     * toInteger alias
     *
     * @return int
     */
    public function toInt(): int
    {
        return $this->toInteger();
    }

    /**
     * Devuelve el valor como un double
     *
     * @return float
     */
    public function toDouble(): float
    {
        return doubleval($this->number);
    }

    /**
     * toDouble alias
     *
     * @return float
     */
    public function toFloat(): float
    {
        return $this->toDouble();
    }

    /**
     * Indica si el valor es mayor que cero
     * (el valor cero da negativo)
     *
     * @return bool
     */
    public function isPositive(): bool
    {
        return $this->number > 0;
    }

    /**
     * Indica si el valor es menor que cero
     * (el valor cero da negativo)
     *
     * @return bool
     */
    public function isNegative(): bool
    {
        return $this->number < 0;
    }

    /**
     * Indica si el valor es un entero
     *
     * @return bool
     */
    public function isInteger(): bool
    {
        return is_integer($this->number);
    }

    /**
     * Indica si el valor es un double
     *
     * @return bool
     */
    public function isDouble(): bool
    {
        return is_double($this->number);
    }
}
