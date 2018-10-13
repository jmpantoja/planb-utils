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

namespace PlanB\DS\Resolver;

/**
 * Resuelve un valor antes de ser añadido a una colección
 */
class Resolver extends AbstractResolver
{
    /**
     * Resolver named constructor.
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * Resolver named constructor.
     *
     * @param string $type
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public static function typed(string $type): self
    {
        $resolver = new static();

        return $resolver->type($type);
    }

    /**
     * @inheritdoc
     */
    public function configure(): void
    {
        // TODO: Implement configure() method.
    }
}
