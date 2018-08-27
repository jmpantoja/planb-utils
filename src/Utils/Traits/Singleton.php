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

namespace PlanB\Utils\Traits;

/**
 * Singletons
 */
trait Singleton
{
    /**
     * @var mixed[]
     */
    private static $instances = [];

    /**
     * Singleton constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Singleton named constructor.
     *
     * @return mixed
     */
    public static function getInstance()
    {
        $class = static::class;

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }

    /**
     * Impide que un singleton se pueda clonar
     */
    private function __clone()
    {
    }

    /**
     * Impide que un singleton se deserializar
     */
    private function __wakeup(): void
    {
    }
}
