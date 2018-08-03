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
     * @var bool
     */
    private $valid = true;

    /**
     * KeyValue constructor.
     *
     * @param mixed      $value
     * @param null|mixed $key
     */
    protected function __construct($value, $key = null)
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
     * @return \PlanB\DS\ItemList\KeyValue
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
     * Asigna un nuevo valor
     *
     * @param mixed $newValue
     *
     * @return \PlanB\DS\ItemList\KeyValue
     */
    public function setValue($newValue): KeyValue
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
     * @return \PlanB\DS\ItemList\KeyValue
     */
    public function setKey($newKey): KeyValue
    {
        $this->hasKey = true;
        $this->key = $newKey;

        return $this;
    }

    /**
     * Elimina la clave de esta paraja clave/valor
     *
     * @return \PlanB\DS\ItemList\KeyValue
     */
    public function removeKey(): KeyValue
    {
        $this->hasKey = false;
        $this->key = null;

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
     * Indica si esta pareja ha sido marcada para como invalida
     *
     * @return bool
     */
    public function isInvalid(): bool
    {
        return !$this->valid;
    }

    /**
     * Marca esta pareja como ignorada
     *
     * @return \PlanB\DS\ItemList\KeyValue
     */
    public function markAsInvalid(): self
    {
        $this->valid = false;

        return $this;
    }

    /**
     * Asigna un valor, solo si no es nulo
     *
     * @param mixed $value
     *
     * @return \PlanB\DS\ItemList\KeyValue
     */
    public function setValueIfNotNull($value): self
    {
        if (!is_null($value)) {
            $this->value = $value;
        }

        return $this;
    }

    /**
     * Devuelve la pareja clave/valor como una cadena de texto
     *
     * @return  string
     */
    public function __toString(): string
    {

        $key = to_string($this->key);
        $value = to_string($this->value);

        return sprintf('%s => %s', $key, $value);
    }
}
