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

use PlanB\Type\Exception\InvalidValueTypeException;
use PlanB\Type\Validator\ValidatorFactory;

/**
 * Procesa una pareja clave/valor antes de ser añadida a la colección
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class ItemResolver
{
    /**
     * @var \PlanB\Type\Validator\Validator
     */
    private $typeValidator;

    /**
     * ItemResolver constructor.
     *
     * @param string $type
     */
    protected function __construct(string $type)
    {
        $this->typeValidator = ValidatorFactory::factory($type);
    }

    /**
     * Crea una nueva instancia, para un tipo
     *
     * @param string $type
     *
     * @return static
     */
    public static function ofType(string $type): self
    {
        return new static($type);
    }

    /**
     * Resuelve una pareja clave/valor
     *
     * @param \PlanB\Type\KeyValue $pair
     *
     * @return \PlanB\Type\KeyValue
     */
    public function resolve(KeyValue $pair): KeyValue
    {
        $this->valueTypeInsurance($pair);
    }

    private function valueTypeInsurance(KeyValue $pair): void
    {
        $value = $pair->getValue();

        if (!$this->typeValidator->validate($value)) {
            $type = $this->getType();
            throw InvalidValueTypeException::forValue($value, $type);
        }
    }

    /**
     * Devuelve el tipo base de la colección
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->typeValidator->getType();
    }
}
