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

namespace PlanB\Console\Beautifier\Formatter\ExceptionFormatter;

use PlanB\Console\Message\Paragraph;

/**
 * Builder para crear el cuerpo de una excepción
 */
class ExceptionBodyBuilder extends ExceptionBuilderAbstract
{

    /**
     * Devuelve el párrafo de encabezado
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function build(): Paragraph
    {
        $message = $this->getException()->getMessage();

        return cli_msg([
            cli_blank(),
            cli_line($message),
            cli_blank(),
        ]);
    }
}
