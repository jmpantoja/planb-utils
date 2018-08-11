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
     * @var object;
     */
    private $object;

    /**
     * GetSetHydrator constructor.
     */
    protected function __construct()
    {
        $nameConverter = NameConverter::create();
        parent::__construct(null, $nameConverter);
    }

    /**
     * Crea una nueva instancia
     *
     * @return \PlanB\Utils\Hydrator\GetSetHydrator
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * Crea un objeto a partir de un array
     *
     * @param string|object $classNameOrObject
     * @param mixed[]       $values
     *
     * @return object
     */
    public function hydrate($classNameOrObject, iterable $values): object
    {

        ensure_type($classNameOrObject)
            ->isTypeOf('string', 'object');


        return $this->denormalize($values, $classNameOrObject);
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

    /**
     * @inheritdoc
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {

        if (is_object($class)) {
            $this->object = $class;
            $class = get_class($class);
        }

        return parent::denormalize($data, $class, $format, $context);
    }

    /**
     * @inheritdoc
     */
    protected function instantiateObject(array &$data, $class, array &$context, \ReflectionClass $reflectionClass, $allowedAttributes, ?string $format = null)
    {
        if (!is_null($this->object)) {
            $object = $this->object;
            $this->object = null;

            return $object;
        }

        return parent::instantiateObject($data, $class, $context, $reflectionClass, $allowedAttributes, $format);
    }
}
