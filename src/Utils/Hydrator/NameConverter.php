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

namespace PlanB\Utils\Hydrator;

use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

/**
 * Convierte nombres de propiedades
 */
class NameConverter implements NameConverterInterface
{
    /**
     * @var string
     */
    private $snakeCaseSeparator;

    /**
     * NameConverter constructor.
     *
     * @param string $snakeCaseSeparator
     */
    protected function __construct(?string $snakeCaseSeparator = null)
    {
        $this->setSnakeCaseSeparator($snakeCaseSeparator);
    }

    /**
     * Crea una nueva instancia
     *
     * @param null|string $snakeCaseSeparator
     *
     * @return \PlanB\Utils\Hydrator\NameConverter
     */
    public static function make(?string $snakeCaseSeparator = null): self
    {
        return new static($snakeCaseSeparator);
    }

    /**
     * Asigna el separador que vamos a usar para snakeCase
     *
     * @param string $snakeCaseSeparator
     *
     * @return \PlanB\Utils\Hydrator\NameConverter
     */
    public function setSnakeCaseSeparator(?string $snakeCaseSeparator = null): NameConverter
    {
        $this->snakeCaseSeparator = $snakeCaseSeparator;

        return $this;
    }


    /**
     * Converts a property name to its normalized value.
     *
     * @param mixed $propertyName
     *
     * @return string
     */
    public function normalize($propertyName): string
    {
        return to_snake_case((string) $propertyName, $this->snakeCaseSeparator);
    }

    /**
     * Converts a property name to its denormalized value.
     *
     * @param mixed $propertyName
     *
     * @return string
     */
    public function denormalize($propertyName): string
    {
        return to_camel_case((string) $propertyName);
    }
}
