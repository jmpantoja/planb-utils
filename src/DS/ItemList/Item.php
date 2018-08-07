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

namespace PlanB\DS\ItemList;

/**
 * Value Object que encapsula una pareja clave/valor
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class Item
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
     * Item constructor.
     *
     * @param mixed      $value
     * @param null|mixed $key
     */
    protected function __construct($value, $key = null)
    {
        $this->value = $value;
        $this->key = $key;
    }

    /**
     * Crea una nueva instancia a partir de una pareja clave/valor
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return static
     */
    public static function fromKeyValue($key, $value)
    {

        return new static($value, $key);
    }

    /**
     * Crea un objeto Item solo con valor
     *
     * @param mixed $value
     *
     * @return \PlanB\DS\ItemList\Item
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
        return !is_null($this->key);
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
     * Asigna un nuevo valor
     *
     * @param mixed $newValue
     *
     * @return \PlanB\DS\ItemList\Item
     */
    public function setValue($newValue): Item
    {
        $this->value = $newValue;

        return $this;
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
     * Asigna una nueva clave
     *
     * @param mixed $newKey
     *
     * @return \PlanB\DS\ItemList\Item
     */
    public function setKey($newKey): Item
    {
        $this->key = $newKey;

        return $this;
    }

    /**
     * Devuelve el tipo
     *
     * @return string
     */
    public function getType(): string
    {
        return is_object($this->value) ? get_class($this->value) : gettype($this->value);
    }

    /**
     * Convierte el item en una cadena de texto
     *
     * @return  string
     */
    public function __toString(): string
    {

        $key = force_to_string($this->key);
        $value = force_to_string($this->value);

        return sprintf('%s => %s', $key, $value);
    }
}
