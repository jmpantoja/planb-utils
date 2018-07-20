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

namespace PlanB\DS\ArrayList;

/**
 * Procesa una pareja clave/valor antes de ser añadida a la colección
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class ItemResolver
{


    /**
     * @var \PlanB\DS\ArrayList\Hook
     */
    private $validator;

    /**
     * @var \PlanB\DS\ArrayList\Hook
     */
    private $normalizer;

    /**
     * @var \PlanB\DS\ArrayList\Hook
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
     * @return \PlanB\DS\ArrayList\ItemResolver
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * Asigna el validador personalizado
     *
     * @param callable $validator
     *
     * @return \PlanB\DS\ArrayList\ItemResolver
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
     * @return \PlanB\DS\ArrayList\ItemResolver
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
     * @return \PlanB\DS\ArrayList\ItemResolver
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
     * @return \PlanB\DS\ArrayList\ItemResolver
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
     * @param \PlanB\DS\ArrayList\KeyValue $pair
     *
     * @return \PlanB\DS\ArrayList\KeyValue
     */
    protected function normalize(KeyValue $pair): KeyValue
    {
        $newValue = $this->normalizer->execute($pair, $pair->getValue());

        return $pair->changeValue($newValue);
    }


    /**
     * Normaliza una clave antes de ser usada
     *
     * @param \PlanB\DS\ArrayList\KeyValue $pair
     *
     * @return \PlanB\DS\ArrayList\KeyValue
     */
    protected function normalizeKey(KeyValue $pair): KeyValue
    {
        $newKey = $this->keyNormalizer->execute($pair, $pair->getKey());

        return $pair->changeKey($newKey);
    }


    /**
     * Valida una pareja clave valor
     *
     * @param \PlanB\DS\ArrayList\KeyValue $pair
     *
     * @return bool
     */
    protected function validate(KeyValue $pair): bool
    {
        return (bool) $this->validator->execute($pair, true);
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
        $pair = $this->normalizeKey($pair);

        if (!$this->validate($pair)) {
            return null;
        }

        return $pair;
    }
}
