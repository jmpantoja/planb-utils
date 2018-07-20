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

use PlanB\DS\ArrayList\Collection;
use PlanB\DS\ArrayList\Exception\ItemNotFoundException;
use PlanB\DS\ArrayList\ItemResolver;
use PlanB\DS\ArrayList\KeyValue;

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
     * @var \PlanB\DS\ArrayList\ItemResolver
     */
    private $itemResolver;

    /**
     * Agrega un elemento a la colección
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function add($value): Collection
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
    public function addAll(iterable $items): Collection
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
    public function set($key, $value): Collection
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
    public function setAll(iterable $items): Collection
    {
        foreach ($items as $key => $value) {
            $this->set($key, $value);
        }

        return $this;
    }


    /**
     * Devuelve un elemento
     *
     * @param mixed $key
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
            throw ItemNotFoundException::forKey((string)$key);
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
    public function unset($key): Collection
    {
        unset($this->items[$key]);

        return $this;
    }

    /**
     * Agrega una pareja clave/valor a la colección
     *
     * @param \PlanB\DS\ArrayList\KeyValue $candidate
     *
     * @return $this
     */
    private function addPair(KeyValue $candidate): Collection
    {

        $pair = $this->getResolver()
            ->resolve($candidate);

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
     * @param \PlanB\DS\ArrayList\KeyValue $pair
     *
     * @return $this
     */
    private function addPairWithKey(KeyValue $pair): Collection
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
     * @param \PlanB\DS\ArrayList\KeyValue $pair
     *
     * @return $this
     */
    private function addPairWithoutKey(KeyValue $pair): Collection
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
     * @return \PlanB\DS\ArrayList\ItemResolver
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
     * @param \PlanB\DS\ArrayList\ItemResolver $resolver
     *
     * @@SuppressWarnings(PMD.UnusedFormalParameter)
     *
     * @return $this
     */
    protected function configure(ItemResolver $resolver): Collection
    {
        return $this;
    }
}
