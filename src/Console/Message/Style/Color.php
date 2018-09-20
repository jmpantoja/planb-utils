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

namespace PlanB\Console\Message\Style;

use MabeEnum\Enum;
use PlanB\Type\Text\Text;

/**
 * Enum con los posibles colores
 */
final class Color extends Enum
{
    public const DEFAULT = 'default';
    public const BLACK = 'black';
    public const RED = 'red';
    public const GREEN = 'green';
    public const YELLOW = 'yellow';
    public const BLUE = 'blue';
    public const MAGENTA = 'magenta';
    public const CYAN = 'cyan';
    public const WHITE = 'white';

    /**
     * Devuelve el valor con formato de attributo
     *
     * @param string $key
     *
     * @return \PlanB\Type\Text\Text
     */
    public function toAttributeFormat(string $key): Text
    {
        if ($this->isDefault()) {
            return Text::create();
        }

        return Text::format('%s=%s', $key, $this->getValue());
    }

    /**
     * Devuelve el segundo color si el primero es default
     *
     * @param \PlanB\Console\Message\Style\Color $color
     *
     * @return \PlanB\Console\Message\Style\Color
     */
    public function merge(Color $color): Color
    {
        if ($this->isDefault()) {
            return $color;
        }

        return $this;
    }

    /**
     * Indica si es el color por defecto
     *
     * @return bool
     */
    protected function isDefault(): bool
    {
        return $this->is(Color::DEFAULT);
    }
}
