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

namespace PlanB\Beautifier\Style;

use MabeEnum\Enum;

/**
 * Enum con los posibles estilos
 *
 * @method static Style DEFAULT()
 * @method static Style TYPE()
 * @method static Style VALUE()
 * @method static Style ARGUMENT()
 * @method static Style STRONG()
 * @method static Style EXCEPTION_HEADER()
 * @method static Style EXCEPTION_BODY()
 */
class StyleType extends Enum
{
    public const DEFAULT = 'default';
    public const TYPE = 'type';
    public const VALUE = 'value';
    public const ARGUMENT = 'argument';
    public const STRONG = 'strong';
    public const EXCEPTION_HEADER = 'exception_header';
    public const EXCEPTION_BODY = 'exception_body';
    public const EXCEPTION_TRACE = 'exception_trace';


    /**
     * Indica si es del tipo Type
     *
     * @return bool
     */
    public function isType(): bool
    {
        return $this->is(StyleType::TYPE());
    }


    /**
     * Indica si es del tipo Value
     *
     * @return bool
     */
    public function isValue(): bool
    {
        return $this->is(StyleType::VALUE());
    }


    /**
     * Indica si es del tipo Argument
     *
     * @return bool
     */
    public function isArgument(): bool
    {
        return $this->is(StyleType::ARGUMENT());
    }


    /**
     * Indica si es del tipo Strong
     *
     * @return bool
     */
    public function isStrong(): bool
    {
        return $this->is(StyleType::STRONG());
    }


    /**
     * Indica si es del tipo Exception Header
     *
     * @return bool
     */
    public function isExceptionHeader(): bool
    {
        return $this->is(StyleType::EXCEPTION_HEADER());
    }

    /**
     * Indica si es del tipo Exception Body
     *
     * @return bool
     */
    public function isExceptionBody(): bool
    {
        return $this->is(StyleType::EXCEPTION_BODY());
    }

    /**
     * Indica si es del tipo Exception Trace
     *
     * @return bool
     */
    public function isExceptionTrace(): bool
    {
        return $this->is(StyleType::EXCEPTION_TRACE());
    }
}
