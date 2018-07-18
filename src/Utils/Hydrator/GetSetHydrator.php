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
class GetSetHydrator
{

    /**
     * @var \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer
     */
    private $normalizer;

    /**
     * GetSetHydrator constructor.
     */
    private function __construct()
    {
        $normalizer = new GetSetMethodNormalizer();

        $this->configure($normalizer);
        $this->normalizer = $normalizer;
    }

    /**
     * Configura el objeto normalizer
     *
     * @param \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer $normalizer
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function configure(GetSetMethodNormalizer $normalizer): void
    {
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
        $values = $this->sanitize($values);

        return $this->normalizer->denormalize($values, $className);
    }

    /**
     * Prepara las claves, para que sean compatibles con nombres de método camelCase
     *
     * @param mixed[] $values
     *
     * @return mixed[]
     */
    private function sanitize(iterable $values): array
    {
        $sanitized = [];
        foreach ($values as $key => $value) {
            $newKey = camelCase((string) $key);
            $sanitized[$newKey] = $value;
        }

        return $sanitized;
    }
}
