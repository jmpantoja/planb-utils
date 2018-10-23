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

namespace PlanB\Beautifier\Style;

use MabeEnum\Enum;

/**
 * Enum con los posibles colores
 *
 * @method static Color DEFAULT()
 * @method static Color BLACK()
 * @method static Color RED()
 * @method static Color GREEN()
 * @method static Color YELLOW()
 * @method static Color BLUE()
 * @method static Color MAGENTA()
 * @method static Color CYAN()
 * @method static Color WHITE()
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
     * Indica si es el color por defecto
     *
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->is(Color::DEFAULT);
    }
}
