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
     * @var \PlanB\Type\Validator\ValidableType
     */
    private $typeValidator;

    /**
     * @var \PlanB\Type\Validator\Validator
     */
    private $validator;

    /**
     * @var callable
     */
    private $normalizer;

    /**
     * @var callable
     */
    private $keyNormalizer;

    /**
     * ItemResolver constructor.
     *
     * @param string $type
     */
    protected function __construct(string $type)
    {
        $this->type = $type;
        $this->typeValidator = ValidatorFactory::factory($type);


        $this->validator = Hook::default();
        $this->normalizer = Hook::default();
        $this->keyNormalizer = Hook::default();
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
     * Devuelve el tipo base de la colección
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }


    /**
     * Asigna el validador personalizado
     *
     * @param callable $validator
     */
    public function setValidator(callable $validator): void
    {
        $this->validator = Hook::fromCallable($validator);
    }


    /**
     * Asigna el normalizador personalizado
     *
     * @param callable $normalizer
     */
    public function setNormalizer(callable $normalizer): void
    {
        $this->normalizer = Hook::fromCallable($normalizer);
    }


    /**
     * Asigna el normalizador de clave personalizado
     *
     * @param callable $normalizer
     */
    public function setKeyNormalizer(callable $normalizer): void
    {
        $this->keyNormalizer = Hook::fromCallable($normalizer);
    }


    /**
     * Configura el ItemResolver a partir de lo que se deduce de una coleccion
     *
     * @param \PlanB\Type\Collection $collection
     */
    public function configure(Collection $collection): void
    {
        $this->validator = Hook::fromArray([$collection, 'validate']);
        $this->normalizer = Hook::fromArray([$collection, 'normalize']);
        $this->keyNormalizer = Hook::fromArray([$collection, 'normalizeKey']);
    }

    /**
     * Normaliza un valor antes de ser añadido
     *
     * @param \PlanB\Type\KeyValue $pair
     *
     * @return \PlanB\Type\KeyValue
     */
    private function normalize(KeyValue $pair): KeyValue
    {
        $newValue = $this->normalizer->execute($pair, $pair->getValue());

        return $pair->changeValue($newValue);
    }


    /**
     * Normaliza una clave antes de ser usada
     *
     * @param \PlanB\Type\KeyValue $pair
     *
     * @return \PlanB\Type\KeyValue
     */
    private function normalizeKey(KeyValue $pair): KeyValue
    {
        $newKey = $this->keyNormalizer->execute($pair, $pair->getKey());

        return $pair->changeKey($newKey);
    }


    /**
     * Valida una pareja clave valor
     *
     * @param \PlanB\Type\KeyValue $pair
     *
     * @return bool
     */
    private function validate(KeyValue $pair): bool
    {
        return (bool) $this->validator->execute($pair, true);
    }

    /**
     * Nos aseguramos que el valor sea del tipo requerido por la colección
     *
     * @param \PlanB\Type\KeyValue $pair
     */
    private function assertType(KeyValue $pair): void
    {

        if (true === (bool) $this->typeValidator->execute($pair)) {
            return;
        }

        $value = $pair->getValue();
        $type = $this->getType();

        throw InvalidValueTypeException::forValue($value, $type);
    }


    /**
     * Resuelve una pareja clave/valor
     *
     * @param \PlanB\Type\KeyValue $pair
     *
     * @return \PlanB\Type\KeyValue|null
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
