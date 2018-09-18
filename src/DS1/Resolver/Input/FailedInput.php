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

namespace PlanB\DS1\Resolver\Input;

/**
 * El valor no es correcto
 */
class FailedInput extends AbstractInput
{
    /**
     * @var mixed
     */
    private $original;

    /**
     * FailedInput constructor.
     *
     * @param mixed $value
     */
    protected function __construct($value)
    {
        parent::__construct($value);
        $this->original = $value;
    }

    /**
     * @return mixed
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * @param mixed $original
     *
     * @return \PlanB\DS1\Resolver\Input\FailedInput
     */
    public function setOriginal($original): FailedInput
    {
        $this->original = $original;

        return $this;
    }
}
