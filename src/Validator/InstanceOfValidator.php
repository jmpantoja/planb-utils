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
 * Validator para comprobar que un valor dado, es una instancia de una clase o implementa una interfaz
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class InstanceOfValidator extends AbstractTypeValidator
{

    /**
     * Indica este validator se resposabiliza de validar el tipo pasado como argumento
     *
     * @param string $type
     *
     * @return bool
     */
    public static function isValidType(string $type): bool
    {
        return class_exists($type) || interface_exists($type);
    }

    /**
     * Valida que un valor sea una instancia de una clase (o interfaz) determinada
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function validate($value): bool
    {
        return $value instanceof $this->type;
    }
}
