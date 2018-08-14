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

namespace PlanB\DS\TypedList\Resolver;

use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\ItemList\Resolver\Validator;
use PlanB\Utils\Type\Type;

/**
 * Valida que el valor de un Item sea de un tipo concreto
 */
class TypeValidator extends Validator
{
    /**
     * @var string
     */
    private $innerType;

    /**
     * TypeValidator constructor.
     *
     * @param string $innerType
     */
    protected function __construct(string $innerType)
    {
        ensure_typename($innerType)->isValid();

        $this->innerType = $innerType;
    }

    /**
     * Devuelve una nueva instancia
     *
     * @param string $innerType
     *
     * @return \PlanB\DS\ItemList\Resolver\TypeValidator
     */
    public static function create(string $innerType): self
    {
        return new static($innerType);
    }

    /**
     * Valida que el valor de un Item sea de un tipo concreto
     *
     * @param mixed                            $value
     * @param mixed                            $key
     * @param \PlanB\DS\ItemList\ListInterface $context
     *
     * @return bool
     */
    public function validate($value, $key = null, ?ListInterface $context = null): bool
    {
        return Type::create($value)->isTypeOf($this->innerType);
    }
}
