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

namespace PlanB\Utils\Collection;

/**
 * Value Object que encapsula una pareja clave/valor
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class KeyValue
{

    /**
     * @var bool
     */
    private $hasKey;

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
     * @return \PlanB\Utils\Collection\KeyValue
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

    /**
     * Crea una nueva clave/valor, con la misma clave que la actual, pero un valor distinto
     *
     * @param mixed $newValue
     *
     * @return \PlanB\Utils\Collection\KeyValue
     */
    public function changeValue($newValue): KeyValue
    {
        if ($this->hasKey()) {
            return static::fromPair($this->key, $newValue);
        }

        return static::fromValue($newValue);
    }


    /**
     * Crea una nueva clave/valor, con el mismo valor que el actual, pero con una clave distinta
     *
     * @param mixed $newKey
     *
     * @return \PlanB\Utils\Collection\KeyValue
     */
    public function changeKey($newKey): KeyValue
    {
        if (is_null($newKey)) {
            return static::fromValue($this->value);
        }

        return static::fromPair($newKey, $this->value);
    }
}
