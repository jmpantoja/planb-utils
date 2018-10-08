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

use Ds\Hashable;

/**
 * Representa a un número
 */
class Number implements Hashable
{
    /**
     * @var float|int
     */
    private $number;

    /**
     * Number named constructor.
     *
     * @param mixed $number
     *
     * @return \PlanB\Type\Number\Number
     */
    public static function make($number): self
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
        ensure_data($number)->isNumeric();

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

    /**
     * Produces a scalar value to be used as the object's hash, which determines
     * where it goes in the hash table. While this value does not have to be
     * unique, objects which are equal must have the same hash value.
     *
     * @return mixed
     */
    public function hash()
    {
        return $this->number;
    }

    /**
     * Determines if two objects should be considered equal. Both objects will
     * be instances of the same class but may not be the same instance.
     *
     * @param mixed $number An instance of the same class to compare to.
     *
     * @return bool
     */
    public function equals($number): bool
    {
        if (!($number instanceof Number)) {
            return false;
        }
        
        return $this->number === $number->number;
    }
}
