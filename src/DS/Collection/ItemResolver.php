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

use PlanB\DS\ArrayList\ItemResolver as BaseItemResolver;
use PlanB\DS\ArrayList\KeyValue;
use PlanB\DS\Collection\Exception\InvalidValueTypeException;

/**
 * ItemResolver con validador de tipo
 */
class ItemResolver extends BaseItemResolver
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var \PlanB\DS\ArrayList\Hook
     */
    private $typeValidator;

    /**
     * ItemResolver constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
        $this->typeValidator = ValidatorFactory::factory($type);
        parent::__construct();
    }

    /**
     * Crea una nueva instancia, para un tipo
     *
     * @param string $type
     *
     * @return static
     */
    public static function withType(string $type): self
    {

        return new self($type);
    }

    /**
     * Devuelve el tipo base de la colección
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }


    /**
     * Nos aseguramos que el valor sea del tipo requerido por la colección
     *
     * @param \PlanB\DS\ArrayList\KeyValue $pair
     *
     * @return \PlanB\DS\ArrayList\ItemResolver
     */
    private function assertType(KeyValue $pair): self
    {

        if (true === (bool) $this->typeValidator->execute($pair)) {
            return $this;
        }

        $value = $pair->getValue();
        $type = $this->getType();

        throw InvalidValueTypeException::forValue($value, $type);
    }


    /**
     * Resuelve una pareja clave/valor
     *
     * @param \PlanB\DS\ArrayList\KeyValue $pair
     *
     * @return \PlanB\DS\ArrayList\KeyValue|null
     */
    public function resolve(KeyValue $pair): ?KeyValue
    {
        $pair = $this->normalize($pair);
        $this->assertType($pair);
        $pair = $this->normalizeKey($pair);

        if (!$this->validate($pair)) {
            return null;
        }

        return $pair;
    }
}
