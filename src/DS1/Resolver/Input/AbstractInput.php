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

namespace PlanB\DS1\Resolver\Input;

use PlanB\Type\Value\Value;

/**
 * Clase base para valores que se tratan de añadir a una colección
 */
abstract class AbstractInput implements InputInterface
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * Input named constructor.
     *
     * @param mixed $value
     * @return Input
     */
    public static function make($value): InputInterface
    {
        return new static($value);
    }

    /**
     * Input constructor.
     * @param mixed $value
     */
    private function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Devuelve el valor actual
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;

    }

    /**
     * @inheritdoc
     */
    public function isTypeOf(?string $allowed): bool
    {
        if (is_null($allowed)) {
            return true;
        }

        return Value::create($this->value)->isTypeOf($allowed);
    }
}
