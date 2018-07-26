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

namespace PlanB\ValueObject\ClassName\Exception;

use PlanB\ValueObject\ClassName\ClassName;

/**
 * Se lanza cuando un nombre de clase no es correcto
 */
class InvalidClassNameExpcetion extends \DomainException
{
    /**
     * No es del tipo que se esperaba
     *
     * @param \PlanB\ValueObject\ClassName\ClassName $className
     * @param string                                 $expected
     * @param null|\Throwable                        $previous
     *
     * @return \PlanB\ValueObject\ClassName\Exception\InvalidClassNameExpcetion
     */
    public static function notChildOf(ClassName $className, string $expected, ?\Throwable $previous = null): self
    {
        $message = sprintf("Class '%s' is not a child of '%s'", $className, $expected);

        return new self($message, 100, $previous);
    }
}
