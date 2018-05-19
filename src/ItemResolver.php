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

use PlanB\Type\Exception\InvalidTypeException;

/**
 * Procesa una pareja clave/valor antes de ser añadida a la colección
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class ItemResolver
{
    /**
     * ItemResolver constructor.
     *
     * @param string $type
     */
    protected function __construct(string $type)
    {
        $this->validTypeInsurance($type);

        $this->type = $type;
    }

    /**
     * Asegura que el tipo dado sea:
     * 1. un nombre de clase
     * 2. un nombre de interfaz
     * 3. un nombre de un tipo nativo
     *
     * @param string $type
     */
    private function validTypeInsurance(string $type): void
    {
        $isClassName = class_exists($type);
        $isInterfaceName = interface_exists($type);

        $isNative = function_exists(sprintf('is_%s', $type));

        $isValid = $isClassName || $isInterfaceName || $isNative;

        if (!$isValid) {
            throw InvalidTypeException::forType($type);
        }
    }


    /**
     * Crea una nueva instancia, para un tipo
     *
     * @param string $type
     *
     * @return static
     */
    public static function ofType(string $type): self
    {
        return new static($type);
    }
}
