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

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

/**
 * Convierte un array en un objeto o viceversa
 */
class GetSetHydrator extends GetSetMethodNormalizer
{

    /**
     * GetSetHydrator constructor.
     */
    public function __construct()
    {
        $nameConverter = new NameConverter();
        parent::__construct(null, $nameConverter);
    }

    /**
     * Crea una nueva instancia
     *
     * @return \PlanB\Utils\Hydrator\GetSetHydrator
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * Crea un objeto a partir de un array
     *
     * @param string  $className
     * @param mixed[] $values
     *
     * @return object
     */
    public function hydrate(string $className, iterable $values): object
    {
        return $this->denormalize($values, $className);
    }

    /**
     * Crea un array a partir de un objeto
     *
     * @param object $object
     *
     * @param string $snakeCaseSeparator
     *
     * @return mixed[]
     */
    public function extract(object $object, string $snakeCaseSeparator = '_'): array
    {
        $this->nameConverter->setSnakeCaseSeparator($snakeCaseSeparator);

        return $this->normalize($object);
    }

    /**
     * @inheritDoc
     */
    protected function isAllowedAttribute($classOrObject, $attribute, $format = null, array $context = array())
    {

        if (is_subclass_of($classOrObject, \IteratorAggregate::class) && 'iterator' === $attribute) {
            return false;
        }

        return parent::isAllowedAttribute($classOrObject, $attribute, $format, $context);
    }
}
