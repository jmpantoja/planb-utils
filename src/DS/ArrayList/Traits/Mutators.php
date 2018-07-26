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

namespace PlanB\DS\ArrayList\Traits;

use PlanB\DS\ArrayList\ArrayList;
use PlanB\DS\ArrayList\Exception\ItemNotFoundException;
use PlanB\DS\KeyValue;

/**
 * Aporta la capacidad de agregar y obtener elementos de la colección
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
trait Mutators
{

    /**
     * @var mixed[]
     */
    protected $items = [];

    /**
     * Agrega un elemento a la colección
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function add($value): ArrayList
    {
        $pair = KeyValue::fromValue($value);
        $this->addPair($pair);

        return $this;
    }

    /**
     * Agrega un conjunto de elementos
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function addAll(iterable $items): ArrayList
    {
        foreach ($items as $value) {
            $this->add($value);
        }

        return $this;
    }

    /**
     * Agrega una pareja clave/valor a la colección
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return $this
     */
    public function set($key, $value): ArrayList
    {
        $pair = KeyValue::fromPair($key, $value);
        $this->addPair($pair);

        return $this;
    }


    /**
     * Agrega un conjunto de parejas clave/valor
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function setAll(iterable $items): ArrayList
    {
        foreach ($items as $key => $value) {
            $this->set($key, $value);
        }

        return $this;
    }


    /**
     * Devuelve un elemento
     *
     * @param mixed      $key
     *
     * @param mixed|null $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $notExists = !$this->exists($key);
        $notPassDefault = (1 === func_num_args());

        if ($notExists && $notPassDefault) {
            throw ItemNotFoundException::forKey((string) $key);
        }

        return $this->items[$key] ?? $default;
    }

    /**
     * Indica si un elemento existe
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function exists($key): bool
    {
        return isset($this->items[$key]);
    }

    /**
     * exists alias
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function has($key): bool
    {
        return $this->exists($key);
    }

    /**
     * Elimina un elemento
     *
     * @param mixed $key
     *
     * @return $this
     */
    public function remove($key): ArrayList
    {
        unset($this->items[$key]);

        return $this;
    }

    /**
     * Agrega una pareja clave/valor a la colección
     *
     * @param \PlanB\DS\KeyValue $candidate
     *
     * @return $this
     */
    private function addPair(KeyValue $candidate): ArrayList
    {
        $resolver = $this->getResolverFor($candidate);
        $pair = $resolver->resolve($candidate);

        if (!($pair instanceof KeyValue)) {
            return $this;
        }

        $this->addPairWithKey($pair);
        $this->addPairWithoutKey($pair);


        return $this;
    }


    /**
     * Agrega una pareja clave/valor a la colección,
     * en el caso de que la clave esté definida
     *
     * @param \PlanB\DS\KeyValue $pair
     *
     * @return $this
     */
    private function addPairWithKey(KeyValue $pair): ArrayList
    {
        if (!$pair->hasKey()) {
            return $this;
        }

        $value = $pair->getValue();
        $key = $pair->getKey();

        $this->items[$key] = $value;

        return $this;
    }


    /**
     * Agrega una pareja clave/valor a la colección,
     * en el caso de que la clave no esté definida
     *
     * @param \PlanB\DS\KeyValue $pair
     *
     * @return $this
     */
    private function addPairWithoutKey(KeyValue $pair): ArrayList
    {
        if ($pair->hasKey()) {
            return $this;
        }

        $value = $pair->getValue();
        $this->items[] = $value;

        return $this;
    }
}
