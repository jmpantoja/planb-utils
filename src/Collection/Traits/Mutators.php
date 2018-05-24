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

namespace PlanB\Type\Collection\Traits;

use PlanB\Type\Collection\Exception\ItemNotFoundException;
use PlanB\Type\Collection\ItemResolver;
use PlanB\Type\Collection\KeyValue;

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
     * @var \PlanB\Type\Collection\ItemResolver
     */
    private $itemResolver;

    /**
     * Agrega un elemento a la colección
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function itemAppend($value)
    {
        $pair = KeyValue::fromValue($value);
        $this->appendPair($pair);

        return $this;
    }

    /**
     * Agrega un conjunto de elementos
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function itemAppendAll(iterable $items)
    {
        foreach ($items as $value) {
            $this->itemAppend($value);
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
    public function itemSet($key, $value)
    {
        $pair = KeyValue::fromPair($key, $value);
        $this->appendPair($pair);

        return $this;
    }


    /**
     * Agrega un conjunto de parejas clave/valor
     *
     * @param mixed[]|iterable $items
     *
     * @return $this
     */
    public function itemSetAll(iterable $items)
    {
        foreach ($items as $key => $value) {
            $this->itemSet($key, $value);
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
    public function itemGet($key, $default = null)
    {
        $notExists = !$this->itemExists($key);
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
    public function itemExists($key): bool
    {
        return isset($this->items[$key]);
    }

    /**
     * Elimina un elemento
     *
     * @param mixed $key
     *
     * @return $this
     */
    public function itemUnset($key)
    {
        unset($this->items[$key]);

        return $this;
    }

    /**
     * Agrega una pareja clave/valor a la colección
     *
     * @param \PlanB\Type\Collection\KeyValue $candidate
     *
     * @return $this
     */
    private function appendPair(KeyValue $candidate)
    {

        $pair = $this->getResolver()
            ->resolve($candidate);

        if (!($pair instanceof KeyValue)) {
            return $this;
        }

        $this->appendPairWithKey($pair);
        $this->appendPairWithoutKey($pair);


        return $this;
    }

    /**
     * Agrega una pareja clave/valor a la colección,
     * en el caso de que la clave esté definida
     *
     * @param \PlanB\Type\Collection\KeyValue $pair
     *
     * @return $this
     */
    private function appendPairWithKey(KeyValue $pair)
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
     * @param \PlanB\Type\Collection\KeyValue $pair
     *
     * @return $this
     */
    private function appendPairWithoutKey(KeyValue $pair)
    {
        if ($pair->hasKey()) {
            return $this;
        }

        $value = $pair->getValue();
        $this->items[] = $value;

        return $this;
    }


    /**
     * Devuelve el objeto ItemResolver
     *
     * Este resolver se construye bajo demanda, para poder ignorarlo en la serialización
     * y que se "autoconstruya" desde el nuevo objeto en la unserialización
     *
     * Si, como parece lógico de primeras, se instanciara en el constructor de la clase, no se puede recuperar desde unserialize
     * y o bien perderiamos esa información, o bien tenemos que serializar datos + resolver
     *
     * @return \PlanB\Type\Collection\ItemResolver
     */
    private function getResolver(): ItemResolver
    {
        if (is_null($this->itemResolver)) {
            $resolver = ItemResolver::ofType($this->type);

            $resolver->configure($this);

            $this->configure($resolver);
            $this->itemResolver = $resolver;
        }

        return $this->itemResolver;
    }

    /**
     * Personaliza el resolver de esta colección,
     *
     * @param \PlanB\Type\Collection\ItemResolver $resolver
     *
     * @@SuppressWarnings(PMD.UnusedFormalParameter)
     *
     * @return $this
     */
    protected function configure(ItemResolver $resolver)
    {
        return $this;
    }
}
