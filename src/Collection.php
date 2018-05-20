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

use PlanB\Type\Exception\ItemNotFoundException;

/**
 * Generic Collection
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class Collection implements \Countable
{

    /**
     * @var string
     */
    private $type;

    /**
     * @var \PlanB\Type\ItemResolver
     */
    private $itemResolver;

    /**
     * @var mixed[]
     */
    private $items = [];


    /**
     * Collection constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }


    /**
     * Devuelve el número total de elementos
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Indica si la colección está vacia
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 === $this->count();
    }

    /**
     * Agrega un elemento a la colección
     *
     * @param mixed $value
     */
    public function itemAppend($value): void
    {
        $pair = KeyValue::fromValue($value);
        $this->appendKeyValue($pair);
    }

    /**
     * Agrega una pareja clave/valor a la colección
     *
     * @param \PlanB\Type\KeyValue $candidate
     */
    private function appendKeyValue(KeyValue $candidate): void
    {

        $pair = $this->getResolver()
            ->resolve($candidate);

        if (!($pair instanceof KeyValue)) {
            return;
        }

        $value = $pair->getValue();
        $key = $pair->getKey();

        if ($pair->hasKey()) {
            $this->items[$key] = $value;

            return;
        }

        $this->items[] = $value;
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
     * @return \PlanB\Type\ItemResolver
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
     * @param \PlanB\Type\ItemResolver $resolver
     *
     * @@SuppressWarnings(PMD.UnusedFormalParameter)
     */
    protected function configure(ItemResolver $resolver): void
    {
    }

    /**
     * Agrega un conjunto de elementos
     *
     * @param mixed[]|iterable $items
     */
    public function itemAppendAll(iterable $items): void
    {
        foreach ($items as $value) {
            $this->itemAppend($value);
        }
    }

    /**
     * Agrega una pareja clave/valor a la colección
     *
     * @param mixed $key
     * @param mixed $value
     */
    public function itemSet($key, $value): void
    {
        $pair = KeyValue::fromPair($key, $value);
        $this->appendKeyValue($pair);
    }

    /**
     * Agrega un conjunto de parejas clave/valor
     *
     * @param mixed[]|iterable $items
     */
    public function itemSetAll(iterable $items): void
    {
        foreach ($items as $key => $value) {
            $this->itemSet($key, $value);
        }
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
     */
    public function itemUnset($key): void
    {
        unset($this->items[$key]);
    }

    /**
     * Devuelve el tipo de la colleción
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
