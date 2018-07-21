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

namespace PlanB\DS\ItemResolver;

use PlanB\DS\ArrayList\ArrayList;
use PlanB\DS\ItemResolver\Exception\InvalidValueTypeException;
use PlanB\DS\KeyValue;

/**
 * Procesa una pareja clave/valor antes de ser añadida a la colección
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class ItemResolver
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var \PlanB\DS\ItemResolver\Hook
     */
    private $typeValidator;

    /**
     * @var \PlanB\DS\ItemResolver\Hook
     */
    private $validator;

    /**
     * @var \PlanB\DS\ItemResolver\Hook
     */
    private $normalizer;

    /**
     * @var \PlanB\DS\ItemResolver\Hook
     */
    private $keyNormalizer;

    /**
     * ItemResolver constructor.
     */
    public function __construct()
    {
        $this->validator = Hook::blank();
        $this->normalizer = Hook::blank();
        $this->keyNormalizer = Hook::blank();
    }

    /**
     * Crea una nueva instancia
     *
     * @return \PlanB\DS\ItemResolver\ItemResolver
     */
    public static function create(): self
    {
        return new self();
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
        return self::create()->setTypeValidaton($type);
    }

    /**
     * Añade la validación por tipo
     *
     * @param string $type
     *
     * @return \PlanB\DS\ItemResolver\ItemResolver
     */
    protected function setTypeValidaton(string $type): self
    {
        $this->type = $type;
        $this->typeValidator = TypeAssertionFactory::factory($type);

        return $this;
    }

    /**
     * Devuelve el tipo base de la colección
     *
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }


    /**
     * Asigna el validador personalizado
     *
     * @param callable $validator
     *
     * @return \PlanB\DS\ItemResolver\ItemResolver
     */
    public function setValidator(callable $validator): self
    {
        $this->validator = Hook::fromCallable($validator);

        return $this;
    }


    /**
     * Asigna el normalizador personalizado
     *
     * @param callable $normalizer
     *
     * @return \PlanB\DS\ItemResolver\ItemResolver
     */
    public function setNormalizer(callable $normalizer): self
    {
        $this->normalizer = Hook::fromCallable($normalizer);

        return $this;
    }


    /**
     * Asigna el normalizador de clave personalizado
     *
     * @param callable $normalizer
     *
     * @return \PlanB\DS\ItemResolver\ItemResolver
     */
    public function setKeyNormalizer(callable $normalizer): self
    {
        $this->keyNormalizer = Hook::fromCallable($normalizer);

        return $this;
    }


    /**
     * Configura el ItemResolver a partir de lo que se deduce de una coleccion
     *
     * @param \PlanB\DS\ArrayList\ArrayList $collection
     *
     * @return \PlanB\DS\ItemResolver\ItemResolver
     */
    public function configure(ArrayList $collection): self
    {
        $this->validator = Hook::fromArray([$collection, 'validate']);
        $this->normalizer = Hook::fromArray([$collection, 'normalize']);
        $this->keyNormalizer = Hook::fromArray([$collection, 'normalizeKey']);

        return $this;
    }

    /**
     * Normaliza un valor antes de ser añadido
     *
     * @param \PlanB\DS\KeyValue $pair
     *
     * @return \PlanB\DS\KeyValue
     */
    protected function normalize(KeyValue $pair): KeyValue
    {
        $newValue = $this->normalizer->execute($pair, $pair->getValue());

        return $pair->changeValue($newValue);
    }


    /**
     * Normaliza una clave antes de ser usada
     *
     * @param \PlanB\DS\KeyValue $pair
     *
     * @return \PlanB\DS\KeyValue
     */
    protected function normalizeKey(KeyValue $pair): KeyValue
    {
        $newKey = $this->keyNormalizer->execute($pair, $pair->getKey());

        return $pair->changeKey($newKey);
    }


    /**
     * Valida una pareja clave valor
     *
     * @param \PlanB\DS\KeyValue $pair
     *
     * @return bool
     */
    protected function validate(KeyValue $pair): bool
    {
        return (bool) $this->validator->execute($pair, true);
    }


    /**
     * Nos aseguramos que el valor sea del tipo requerido por la colección
     *
     * @param \PlanB\DS\KeyValue $pair
     *
     * @return \PlanB\DS\ItemResolver\ItemResolver
     */
    private function assertType(KeyValue $pair): self
    {

        if (!($this->typeValidator instanceof Hook)) {
            return $this;
        }

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
     * @param \PlanB\DS\KeyValue $pair
     *
     * @return \PlanB\DS\KeyValue|null
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
