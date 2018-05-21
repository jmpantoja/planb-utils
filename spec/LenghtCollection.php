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

namespace PlanB\Type;


/**
 * Esta collecion solo admite enteros menores o iguales a 10,
 * Puede normalizar una cadena de texto, convertiendola en un entero igual a su longitud
 * La clave una cadena, compuesta por el caracter 'x' repetido tantas veces como indique el valor
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class LenghtCollection extends Collection
{
    public function __construct()
    {
        parent::__construct('int');
    }


    public function validate(int $value)
    {
        return $value <= 10;
    }

    public function normalize(string $value): int
    {
        return strlen($value);
    }

    public function normalizeKey(int $value, ?string $key): ?string
    {
        return str_repeat('x', $value);
    }

}