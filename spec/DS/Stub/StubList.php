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

namespace spec\PlanB\DS\Stub;

use PlanB\DS\ArrayList\ArrayList;


/**
 * Esta lista solo admite cadenas de texto menores o iguales a 10 caracteres,
 *
 * Puede normalizar una cadena de texto, añadiendo espacios en blanco a la izquierda hasta completar los 10 caracteres
 * La clave  es la longitud de la cadena
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class StubList extends ArrayList
{

    public function validate(string $value)
    {
        return strlen(trim($value)) <= 10;
    }

    public function normalize(string $value): string
    {
        return str_pad(trim($value), 10, '-', STR_PAD_LEFT);
    }

    public function normalizeKey(string $value): string
    {
        return (string)strlen(trim($value, '-'));
    }

}
