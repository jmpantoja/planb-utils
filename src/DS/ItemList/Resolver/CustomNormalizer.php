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

use PlanB\DS\ItemList\ListInterface;

/**
 * Normaliza el valor de un Item, mediante un callback
 */
class CustomNormalizer extends Normalizer
{
    /**
     * @var callable
     */
    private $callback;

    /**
     * CustomNormalizer constructor.
     *
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * Crea una nueva instancia
     *
     * @param callable $callback
     *
     * @return \PlanB\DS\ItemList\Resolver\CustomValidator
     */
    public static function create(callable $callback): self
    {
        return new self($callback);
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
