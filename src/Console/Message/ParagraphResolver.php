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

namespace PlanB\Console\Message;

use PlanB\Console\Message\Style\Style;
use PlanB\DS\Resolver\AbstractResolver;
use PlanB\Type\DataType\Type;

/**
 * Resolver de la clase Paragraph
 */
class ParagraphResolver extends AbstractResolver
{
    /**
     * @var \PlanB\Console\Message\Style\Style
     */
    private $style;

    /**
     * Named Constructor
     *
     * @return \PlanB\Console\Message\ParagraphResolver
     */
    public static function make(Style $style): self
    {
        return new static($style);
    }

    /**
     * ParagraphResolver constructor.
     *
     * @param \PlanB\Console\Message\Style\Style $style
     */
    protected function __construct(Style $style)
    {

        $this->style = $style;
        parent::__construct();
    }

    /**
     * Configura este resolver
     *
     * @return void
     */
    public function configure(): void
    {
        $this->type(LineWithStyle::class);

        $this->converter(function ($text) {
            $line = Line::make($text);

            return LineWithStyle::make($line, $this->style->clone());
        }, Type::STRINGIFABLE);
    }
}
