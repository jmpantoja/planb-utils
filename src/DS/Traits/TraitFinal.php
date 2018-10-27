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

namespace PlanB\DS\Traits;

use PlanB\DS\Resolver\ResolverInterface;

/**
 * Método configure para las clases finales
 */
trait TraitFinal
{
    /**
     * @inheritdoc
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function configure(/** @scrutinizer ignore-unused */ ResolverInterface $resolver): void
    {
    }
}
