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

namespace PlanB\Beautifier;

use MabeEnum\Enum;

/**
 * Enum para los distintos entornos
 *
 * @method static Enviroment PLAIN_TEXT()
 * @method static Enviroment CONSOLE()
 * @method static Enviroment HTML()
 */
class Enviroment extends Enum
{

    public const PLAIN_TEXT = 'plain';
    public const CONSOLE = 'console';
    public const HTML = 'html';

    /**
     * Devuelve el Enviroment que corresponde a
     * un valor determinado de PHP_SAPI
     *
     * @param string $sapi
     *
     * @return \PlanB\Beautifier\Enviroment
     */
    public static function getFromSapi(string $sapi): Enviroment
    {
        if (in_array($sapi, ['cli', 'phpdbg'])) {
            return Enviroment::CONSOLE();
        }

        return Enviroment::HTML();
    }


    /**
     * Indica si es del tipo console
     *
     * @return bool
     */
    public function isConsole(): bool
    {
        return $this->is(self::CONSOLE());
    }

    /**
     * Indica si es del tipo html
     *
     * @return bool
     */
    public function isHtml(): bool
    {
        return $this->is(self::HTML());
    }
}
