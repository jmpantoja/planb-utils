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

namespace PlanB\Beautifier\Parser;

/**
 * Aplica estilo a una template, en texto plano
 */
class PlainTextParser extends Parser
{
    /**
     * Devuelve una template parseada
     *
     * @param string   $template
     * @param string[] $replacements
     *
     * @return string
     */
    public function parse(string $template, array $replacements = []): string
    {
        $output = parent::parse($template, $replacements);
        $lines = explode("\n", $output);

        $lines = array_filter($lines, function ($line) {
            return !is_blank($line);
        });

        return implode("\n", $lines);
    }
}
