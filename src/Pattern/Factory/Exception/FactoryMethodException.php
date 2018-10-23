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

namespace PlanB\Pattern\Factory\Exception;

use PlanB\Beautifier\Beautifier;
use Throwable;

/**
 * Se lanza cuando se trata de registar un ḿétodo incorrecto en una factoria
 */
class FactoryMethodException extends \DomainException
{

    /**
     * FactoryException constructor.
     *
     * @param string          $message
     * @param \Throwable|null $previous
     */
    protected function __construct(string $message = "", ?Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }

    /**
     * FactoryException named constructor.
     *
     * @param string          $method
     * @param null|\Throwable $previous
     *
     * @return \PlanB\Pattern\Factory\Exception\FactoryMethodException
     */
    public static function make(string $method, ?Throwable $previous = null): self
    {
        $template = <<<eof
            The factory <strong:text> associated with method <argument:method>
            because <strong:non_exists> or <strong:non_visible>
eof;
        $message = Beautifier::make()
            ->parse($template, [
                'text' => 'cannot create the value',
                'non_exists' => "does not exists",
                'non_visible' => "is not visible",
                'method' => sprintf('"%s"', $method),
            ]);

        return new static($message, $previous);
    }

    /**
     * FactoryException named constructor.
     *
     * @param mixed[]         $method
     * @param null|\Throwable $previous
     *
     * @return \PlanB\Pattern\Factory\Exception\FactoryMethodException
     */
    public static function fromArray(array $method, ?Throwable $previous = null): self
    {
        $className = get_class($method[0]);
        $methodName = $method[1];

        $method = sprintf('%s::%s', $className, $methodName);

        return self::make($method, $previous);
    }
}
