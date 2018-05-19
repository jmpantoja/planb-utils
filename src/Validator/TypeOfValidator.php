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
 * Validator para comprobar que un valor dado, es de un tipo nativo (string, array, int, bool, etc)
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class TypeOfValidator extends AbstractTypeValidator
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
        $function = sprintf('is_%s', strtolower($type));

        return function_exists($function);
    }

    /**
     * Valida que un valor sea de un tipo determinado
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function validate($value): bool
    {
        $function = sprintf('is_%s', strtolower($this->type));

        return call_user_func($function, $value);
    }
}
