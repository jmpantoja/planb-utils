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

namespace PlanB\Utils\Cli;

/**
 * Estilo para mostrar texto por consola
 */
class Style
{
    /**
     * Style constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Named Constructor
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public static function create(): self
    {

        return new static();
    }

    /**
     * Asigna un color para el texto
     *
     * @param \PlanB\Utils\Cli\Color $color
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public function foreground(Color $color): self
    {
        $this->fgColor = $color;

        return $this;
    }
}
