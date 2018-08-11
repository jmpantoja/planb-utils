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
 * Valida un Item, mediante un callback
 */
class CustomValidator extends Validator
{

    /**
     * @var callable
     */
    private $callback;

    /**
     * CustomValidator constructor.
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
     * Valida un item
     *
     * @param mixed                            $value
     * @param mixed                            $key
     * @param \PlanB\DS\ItemList\ListInterface $context
     *
     * @return bool
     */
    public function validate($value, $key = null, ?ListInterface $context = null): bool
    {
        return true === (bool) call_user_func($this->callback, $value, $key, $context);
    }
}
