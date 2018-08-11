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
 * Normaliza la clave de un Item, mediante un callback
 */
class CustomKeyNormalizer extends KeyNormalizer
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
    protected function __construct(callable $callback)
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
        return new static($callback);
    }

    /**
     * Devuelve la clave normalizada
     *
     * @param mixed                                 $key
     * @param null|mixed                            $value
     * @param null|\PlanB\DS\ItemList\ListInterface $context
     *
     * @return mixed
     */
    public function normalize($key, $value = null, ?ListInterface $context = null)
    {
        return call_user_func($this->callback, $key, $value, $context);
    }
}
