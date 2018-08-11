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

namespace PlanB\DS\ItemList\Resolver;

use PlanB\DS\ItemList\Item;
use PlanB\DS\ItemList\ListInterface;

/**
 * Valida un Item, mediante un callback
 */
class Hydrator implements Resolvable
{

    /**
     * @var string
     */
    private $type;

    /**
     * @var callable
     */
    private $callback;

    /**
     * CustomValidator constructor.
     *
     * @param string   $type
     * @param callable $callback
     */
    protected function __construct(string $type, callable $callback)
    {
        ensure_typename($type)->isValid();

        $this->type = $type;
        $this->callback = $callback;
    }

    /**
     * Crea una nueva instancia
     *
     * @param string   $type
     * @param callable $callback
     *
     * @return \PlanB\DS\ItemList\Resolver\Hydrator
     */
    public static function create(string $type, callable $callback): self
    {
        return new static($type, $callback);
    }


    /**
     * Resuelve un Item, normalizando el valor
     *
     * @param \PlanB\DS\ItemList\Item               $item
     *
     * @param null|\PlanB\DS\ItemList\ListInterface $context
     *
     * @return bool
     */
    public function __invoke(Item $item, ?ListInterface $context = null): bool
    {
        if (!$item->isTypeOf($this->type)) {
            return true;
        }

        $value = $item->getValue();
        $key = $item->getKey();

        $newValue = $this->normalize($value, $key, $context);
        $item->setValue($newValue);

        return true;
    }

    /**
     * Devuelve el valor normalizado
     *
     * @param mixed                                 $value
     * @param null |mixed                           $key
     * @param null|\PlanB\DS\ItemList\ListInterface $context
     *
     * @return mixed
     */
    public function normalize($value, $key = null, ?ListInterface $context = null)
    {
        return call_user_func($this->callback, $value, $key, $context);
    }
}
