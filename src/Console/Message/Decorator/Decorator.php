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

namespace PlanB\Console\Message\Decorator;

/**
 * Clase base para decorators
 */
abstract class Decorator implements DecoratorInterface
{

    /**
     * Decorator named constructor.
     *
     * @return \PlanB\Console\Message\Decorator\DecoratorInterface
     */
    public static function make(): DecoratorInterface
    {
        return new static();
    }

    /**
     * Decorator constructor.
     */
    protected function __construct()
    {
    }
}
