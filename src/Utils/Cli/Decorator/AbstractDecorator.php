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

namespace PlanB\Utils\Cli\Decorator;

/**
 * Decorador Abstracto
 */
abstract class AbstractDecorator implements DecoratorInterface
{
    /**
     * AbstractDecorator constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Decorator named constructor
     *
     * @return \PlanB\Utils\Cli\Decorator\DecoratorInterface
     */
    public static function create(): DecoratorInterface
    {
        return new static();
    }
}
