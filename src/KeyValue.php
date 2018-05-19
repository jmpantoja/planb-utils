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

namespace PlanB\Type;

/**
 * Value Object que encapsula una pareja clave/valor
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class KeyValue
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @var mixed
     */
    private $key;

    /**
     * KeyValue constructor.
     *
     * @param mixed      $value
     * @param null|mixed $key
     */
    private function __construct($value, $key = null)
    {
        $this->hasKey = 2 === func_num_args();
        $this->value = $value;
        $this->key = $key;
    }

    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @return static
     */
    public static function fromPair($key, $value)
    {

        return new static($value, $key);
    }

    /**
     * Crea un objeto KeyValue solo con valor
     *
     * @param mixed $value
     *
     * @return \PlanB\Type\KeyValue
     */
    public static function fromValue($value): self
    {
        return new static($value);
    }

    /**
     * Indica si esta instancia contiene una key
     *
     * @return bool
     */
    public function hasKey(): bool
    {
        return $this->hasKey;
    }

    /**
     * Devuelve el valor
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Devuelve la clave
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }
}