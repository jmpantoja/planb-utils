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
 * Validator Abstracto
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
abstract class AbstractTypeValidator implements Validator
{

    /**
     * @var string
     */
    protected $type;

    /**
     * AbstractTypeValidator constructor.
     *
     * @param string $type
     */
    protected function __construct(string $type)
    {
        $this->type = $type;
    }


    /**
     * Devuelve el tipo contra el que se valida
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Crea una instancia con un tipo asignado
     *
     * @param string $type
     *
     * @return \PlanB\Type\Validator\AbstractTypeValidator
     */
    public static function forType(string $type): self
    {
        return new static($type);
    }

    /**
     * Indica este validator se resposabiliza de validar el tipo pasado como argumento
     *
     * @param string $type
     *
     * @return bool
     */
    abstract public static function isValidType(string $type): bool;
}
