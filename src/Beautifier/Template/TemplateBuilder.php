<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace PlanB\Beautifier\Template;

/**
 * Builder para crear objetos Template
 */
class TemplateBuilder
{
    /**
     * TemplateBuilder named constructor.
     * @return TemplateBuilder
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * TemplateBuilder constructor.
     */
    protected function __construct()
    {
    }

}
