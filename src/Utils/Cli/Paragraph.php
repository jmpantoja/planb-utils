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

namespace PlanB\Utils\Cli;

use PlanB\DS\TypedList\AbstractTypedList;
use PlanB\Utils\Cli\Style\Align;
use PlanB\Utils\Cli\Style\Spacing;
use PlanB\Utils\Cli\Style\Style;
use PlanB\ValueObject\Text\Text;

/**
 * Representa a un bloque de texto con un estilo comun
 */
class Paragraph extends AbstractTypedList
{


    /**
     * @var \PlanB\Utils\Cli\Message
     */
    private $parent;

    /**
     * @var \PlanB\Utils\Cli\Style\Style
     */
    private $style;

    /**
     * @var \PlanB\Utils\Cli\Style\Spacing
     */
    private $spacing;


    /**
     * Paragraph Named Constructor.
     *
     * @param string $format
     * @param mixed  ...$arguments
     *
     * @return \PlanB\Utils\Cli\Paragraph
     */
    public static function create(string $format, ...$arguments): Paragraph
    {
        $text = Text::format($format, ...$arguments);

        return new static($text);
    }

    /**
     * Paragraph constructor.
     *
     * @param \PlanB\ValueObject\Text\Text $text
     */
    protected function __construct(Text $text)
    {

        parent::__construct();

        $this->style = Style::create();
        $this->spacing = Spacing::create();

        $this->addAll($text->explode(Text::LINE_BREAK));
    }

    /**
     * Configura el comportamiento de  la lista
     *
     * @return void
     */
    protected function customize(): void
    {
        $this->addHydrator(Text::class, function (Text $text) {
            return Line::create($text);
        });
    }


    /**
     * Devuelve el tipo de la lista
     *
     * @return null|string
     */
    public function getInnerType(): string
    {
        return Line::class;
    }

    /**
     * Asigna el mensaje padre
     *
     * @param \PlanB\Utils\Cli\Message $parent
     *
     * @return \PlanB\Utils\Cli\Paragraph
     */
    public function parent(Message $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Asigna el estilo
     *
     * @param \PlanB\Utils\Cli\Style\Style $style
     *
     * @return \PlanB\Utils\Cli\Paragraph
     */
    public function style(Style $style): self
    {
        $this->style = $style;

        return $this;
    }

    /**
     * @param int      $left
     * @param int|null $right
     *
     * @return \PlanB\Utils\Cli\Style\Style
     */
    public function padding(int $left, ?int $right = null): self
    {
        $this->spacing->padding($left, $right);

        return $this;
    }

    /**
     * Asigna una alineación para el texto
     *
     * @param \PlanB\Utils\Cli\Style\Align $align
     *
     * @return \PlanB\Utils\Cli\Style\Style
     */
    public function align(Align $align): self
    {
        $this->spacing->align($align);

        return $this;
    }

    /**
     * Asigna un nuevo ancho de párrafo
     *
     * @param int $width
     *
     * @return $this
     */
    public function expandTo(int $width)
    {
        $this->spacing->expandTo($width);

        return $this;
    }

    /**
     * Devuelve el texto formateado
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function render(): Text
    {
        $width = $this->getMaxLength();
        $this->spacing->expandTo($width);

        return $this
            ->map(function (Line $line) {
                return $line->render($this->style, $this->spacing);
            })->concat(Text::LINE_BREAK);
    }

    /**
     * Devuelve la longitud máxima, sin incluir el padding
     *
     * @return int
     */
    public function getMaxLength(): int
    {
        return (int) $this->max(function (Line $line) {
            return $line->getContentLength();
        });
    }


    /**
     * Finaliza la configuración y devuelve el padre
     *
     * @return \PlanB\Utils\Cli\Message
     */
    public function end(): Message
    {
        return $this->parent;
    }
}
