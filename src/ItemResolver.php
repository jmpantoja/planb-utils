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
     * @var callable
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
     * @return \PlanB\Type\KeyValue|null
     */
    public function resolve(KeyValue $pair): ?KeyValue
    {

        $pair = $this->normalize($pair);
        $this->valueTypeInsurance($pair);
        
        $pair = $this->normalizeKey($pair);

        if (!$this->validate($pair)) {
            return null;
        }

        return $pair;
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
        if (is_callable($this->normalizer)) {
            $value = $pair->getValue();
            $key = $pair->getKey();

            $newValue = call_user_func($this->normalizer, $value, $key);
            $pair = $pair->changeValue($newValue);
        }

        return $pair;
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
        if (is_callable($this->keyNormalizer)) {
            $value = $pair->getValue();
            $key = $pair->getKey();

            $newKey = call_user_func($this->keyNormalizer, $value, $key);
            $pair = $pair->changeKey($newKey);
        }

        return $pair;
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
        if (is_callable($this->validator)) {
            $value = $pair->getValue();
            $key = $pair->getKey();

            return (bool) call_user_func($this->validator, $value, $key);
        }

        return true;
    }

    /**
     * Nos aseguramos que el valor sea del tipo requerido por la colección
     *
     * @param \PlanB\Type\KeyValue $pair
     */
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

    /**
     * Configura el ItemResolver a partir de lo que se deduce de una coleccion
     *
     * @param \PlanB\Type\Collection $collection
     */
    public function configure(Collection $collection): void
    {
        $validator = [$collection, 'validate'];
        if (is_callable($validator)) {
            $this->setValidator($validator);
        }

        $normalizer = [$collection, 'normalize'];
        if (is_callable($normalizer)) {
            $this->setNormalizer($normalizer);
        }

        $keyNormalizer = [$collection, 'normalizeKey'];
        if (!is_callable($keyNormalizer)) {
            return;
        }

        $this->setKeyNormalizer($keyNormalizer);
    }

    /**
     * Asigna el validador personalizado
     *
     * @param callable $validator
     */
    public function setValidator(callable $validator): void
    {

        $this->validator = $validator;
    }

    /**
     * Asigna el normalizador personalizado
     *
     * @param callable $normalizer
     */
    public function setNormalizer(callable $normalizer): void
    {

        $this->normalizer = $normalizer;
    }

    /**
     * Asigna el normalizador de clave personalizado
     *
     * @param callable $normalizer
     */
    public function setKeyNormalizer(callable $normalizer): void
    {
        $this->keyNormalizer = $normalizer;
    }
}
