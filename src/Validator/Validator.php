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

namespace PlanB\Type\Validator;

/**
 * Interfaz para validadores
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
interface Validator
{
    /**
     * Valida que un valor sea del tipo correcto
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function validate($value): bool;
}
