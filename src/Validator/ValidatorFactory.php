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

use PlanB\Type\Exception\InvalidTypeException;

/**
 * Method Factory para crear el validator que corresponde a un tipo determinado
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class ValidatorFactory
{

    /**
     * Crea validators
     *
     * @param string $type
     *
     * @return \PlanB\Type\Validator\Validator
     */
    public static function factory(string $type): Validator
    {
        if (TypeOfValidator::isValidType($type)) {
            return TypeOfValidator::forType($type);
        }

        if (InstanceOfValidator::isValidType($type)) {
            return InstanceOfValidator::forType($type);
        }

        throw InvalidTypeException::forType($type);
    }
}
