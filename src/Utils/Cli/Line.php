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

namespace PlanB\Utils\Cli;

use PlanB\DS\TypedList\TypedListFactory;
use PlanB\Utils\Cli\Decorator\DecoratorInterface;
use PlanB\Utils\Cli\Decorator\JustifyDecorator;
use PlanB\Utils\Cli\Decorator\MergeStyleDecorator;
use PlanB\Utils\Cli\Decorator\PaddingDecorator;
use PlanB\Utils\Cli\Decorator\StyleDecorator;
use PlanB\Utils\Cli\Style\Spacing;
use PlanB\Utils\Cli\Style\Style;
use PlanB\Type\Text\Text;

/**
 * Una linea que forma parte de un parrafo
 */
class Line extends Text
{

    /**
     * @var \PlanB\DS\TypedList\TypedListInterface
     */
    private $decorators;

    /**
     * Line constructor.
     *
     * @param string $text
     */
    protected function __construct(string $text)
    {
        $this->decorators = TypedListFactory::fromType(DecoratorInterface::class)
            ->addAll([
                MergeStyleDecorator::create(),
                JustifyDecorator::create(),
                StyleDecorator::create(),
                PaddingDecorator::create(),
            ]);

        $text = preg_replace("/\t/", Style::TAB, $text);
        parent::__construct($text);
    }


    /**
     * Aplica un estilo al texto de la linea
     *
     * @param \PlanB\Utils\Cli\Style\Style   $style
     * @param \PlanB\Utils\Cli\Style\Spacing $spacing
     *
     * @return \PlanB\Type\Text\Text
     */
    public function render(Style $style, Spacing $spacing): Text
    {
        return $this->decorators
            ->reduce(function (DecoratorInterface $decorator, Line $line, Style $style, Spacing $spacing) {
                return $decorator->decorate($line, $style, $spacing);
            }, $this, $style, $spacing);
    }

    /**
     * Devuelve la longitud de la cadena, sin tener en cuenta las etiquetas
     *
     * @return int
     */
    public function getContentLength(): int
    {
        return $this->stripTags()
            ->getLength();
    }

    /**
     * Devuelve la longitud del texto ocupado por etiquetas
     *
     * @return int
     */
    public function getTagsLength(): int
    {
        return $this->getLength() - $this->getContentLength();
    }
}
