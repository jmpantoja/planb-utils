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

namespace PlanB\DS\Collection;

use PlanB\DS\ArrayList\ArrayList;
use PlanB\DS\ItemResolver\ItemResolver;
use PlanB\DS\KeyValue;

/**
 * Conjunto de datos del mismo tipo
 */
class Collection extends ArrayList
{

    /**
     * @var null|string
     */
    private $type;

    /**
     * Collection constructor.
     *
     * @param string $type
     */
    public function __construct(?string $type = null)
    {
        $this->type = $type;
        parent::__construct();
    }

    /**
     * Crea una colección, a partir de su tipo
     *
     * ```php
     * $collectionOfStrings = Creator::fromType("string");
     * $collectionOfExceptions = Creator::fromType(\Exception::class);
     *
     * ```
     *
     * @param string $type
     *
     * @return \PlanB\DS\ArrayList\ArrayList
     */
    public static function fromType(string $type): Collection
    {
        return new self($type);
    }

    /**
     * Devuelve el tipo de la colleción
     *
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Crea el objecto ItemResolver
     *
     * Hacer que la construcción del objeto ItemResolver dependa un KeyValue, nos permite ajustarlo al primer elemento
     * de la colección, y por consecuencia, crear colecciones agnosticas que tomen el tipo del primer elemento
     *
     * @param \PlanB\DS\KeyValue $first
     *
     * @return \PlanB\DS\ItemResolver\ItemResolver
     */
    protected function buildItemResolver(KeyValue $first): ItemResolver
    {
        $this->type = $this->type ?? $first->getType();

        $resolver = ItemResolver::withType($this->type);

        return $resolver;
    }
}
