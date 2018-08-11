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

namespace PlanB\Utils\Options\Exception;

/**
 * Se lanza cuando se trata de crear un Dictionary con  un perfil que no está definido
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class UndefinedProfileException extends \OutOfRangeException
{
    /**
     * UndefinedProfileException constructor.
     *
     * @param string                                        $message
     * @param null|\PlanB\Utils\Options\Exception\Throwable $previous
     */
    protected function __construct(string $message, ?Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }

    /**
     * Crea una instancia, con un mensae que indica que el perfil indicado no existe
     *
     * @param string          $name
     * @param null|\Throwable $previous
     *
     * @return \PlanB\Utils\Options\Exception\UndefinedProfileException
     */
    public static function forProfile(string $name, ?\Throwable $previous = null): self
    {

        $example = <<<eof
    Add new profiles overriding customize method
    Example:    
    \e[32m        
    public function customize(){
        \$this->addProfile('$name', \$callable);    
    }
    \e[0m
       
eof;

        $message = sprintf("Undefined profile: %s\n%s", $name, $example);

        return new static($message, $previous);
    }
}
