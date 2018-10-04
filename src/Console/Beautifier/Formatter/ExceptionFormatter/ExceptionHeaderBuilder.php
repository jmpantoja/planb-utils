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
use PlanB\Console\Message\Style\Color;

/**
 * Builder para crear el encabazado de una excepción
 */
class ExceptionHeaderBuilder extends ExceptionBuilderAbstract
{
    /**
     * Devuelve el párrafo de encabezado
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function build(): Paragraph
    {
        return cli_msg([
            cli_blank(),
            $this->buildTitle(),
            $this->buildOrigin(),
            cli_blank(),
        ])->bgColor(Color::RED())->center();
    }

    /**
     * Devuelve el titulo
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    private function buildTitle(): Paragraph
    {
        $title = get_class($this->getException());

        return cli_line('[%s]', $title)->bold();
    }

    /**
     * Devuelve la linea de origen
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    private function buildOrigin(): Paragraph
    {
        return cli_line('%s:%s', ...[
            $this->getException()->getFile(),
            $this->getException()->getLine(),
        ]);
    }
}
