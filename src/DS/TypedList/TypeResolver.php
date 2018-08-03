<?php

/**
 * This file is part of the planb project.
 *
 * (c) jmpantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PlanB\DS\TypedList;

use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\ItemList\Resolver\AbstractResolver;

/**
 * Resolver para asegurar que el valor es del tipo adecuado
 */
class TypeResolver extends AbstractResolver
{
    /**
     * @var string
     */
    private $type;

    /**
     * TypeResolver constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Crea una nueva instancia
     *
     * @param string $type
     *
     * @return \PlanB\DS\TypedList\TypeResolver
     */
    public static function create(string $type): self
    {
        return new self($type);
    }

    /**
     * Resuelve una pareja clave/valor
     *
     * @param mixed                            $value
     * @param mixed                            $key
     * @param \PlanB\DS\ItemList\ListInterface $context
     *
     * @return mixed
     */
    public function resolve($value, $key, ListInterface $context)
    {
        $typeOf = is_typeof($value, $this->type);

        if (!$typeOf) {
            $this->markAsInvalid();
        };

        return $value;
    }
}
