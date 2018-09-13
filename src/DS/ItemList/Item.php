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

use PlanB\Type\Stringifable;
use PlanB\Type\Value\Value;
use PlanB\Utils\Traits\Stringify;

/**
 * Input Object que encapsula una pareja clave/valor
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class Item implements Stringifable
{

    use Stringify;
    
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
     * Indica si el valor es de un tipo determinado
     *
     * @param string ...$allowed
     *
     * @return bool
     */
    public function isTypeOf(string ...$allowed): bool
    {
        return Value::create($this->value)->isTypeOf(...$allowed);
    }

    /**
     * Devuelve el tipo
     *
     * @return string
     */
    public function getType(): string
    {
        return Value::create($this->value)->getType()->stringify();
    }


    /**
     * __toString alias
     *
     * @return string
     */
    public function stringify(): string
    {
        $key = force_to_string($this->getKey());
        $value = force_to_string($this->getValue());

        $pieces = [
            sprintf('<fg=cyan>Key</>: <fg=yellow>%s</>', $key),
            sprintf('<fg=cyan>Input</>: <fg=yellow>%s</>', $value),
        ];

        return sprintf("\n[\n\t%s\n]", implode("\n\t", $pieces));
    }
}
