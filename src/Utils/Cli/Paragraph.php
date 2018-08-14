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

use PlanB\ValueObject\Text\Text;

/**
 * Representa a un bloque de texto con un estilo comun
 */
class Paragraph
{
    /**
     * @var \PlanB\ValueObject\Text\TextList
     */
    private $lines;

    /**
     * @var \PlanB\Utils\Cli\Style
     */
    private $style;


    /**
     * @var \PlanB\Utils\Cli\Renderer
     */
    private $renderer;

    /**
     * @var int
     */
    private $paddingLength = 0;

    /**
     * @var \PlanB\Utils\Cli\Message
     */
    private $parent;

    /**
     * Paragraph constructor.
     *
     * @param \PlanB\ValueObject\Text\Text $text
     */
    protected function __construct(Text $text)
    {

        $this->style = Style::create();
        $this->renderer = Renderer::create();

        $this->lines = $text->explode(Text::LINE_BREAK)
            ->map(function (Text $text) {
                return $text->replace("/\t/", function () {
                    return Renderer::TAB;
                });
            });
    }

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
     * Devuelve el texto formateado
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function render(): Text
    {
        $this->prepare();

        return $this->lines->map(function (Text $line) {
            return $this->renderer->render($line, $this->style);
        })->concat(Text::LINE_BREAK);
    }

    /**
     * Acciones previas a renderizar el parrafo
     */
    private function prepare(): void
    {
        $width = $this->getWidth();
        $this->renderer->expandTo($width);
    }

    /**
     * Calcula el ancho efectivo de este párrafo
     *
     * @return int
     */
    private function getWidth(): int
    {

        if ($this->hasParent()) {
            return $this->parent->getMaxLenght();
        }

        return $this->getMaxLenght() - $this->paddingLength;
    }

    /**
     * Indica si el párrafo esta asociado o no a un mensaje
     *
     * @return bool
     */
    private function hasParent(): bool
    {
        return !is_null($this->parent);
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
     * @param \PlanB\Utils\Cli\Style $style
     *
     * @return \PlanB\Utils\Cli\Paragraph
     */
    public function style(Style $style): self
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Asigna una alineación para el texto
     *
     * @param \PlanB\Utils\Cli\Align $align
     *
     * @return \PlanB\Utils\Cli\Paragraph
     */
    public function align(Align $align): self
    {
        $this->renderer->align($align);

        return $this;
    }

    /**
     * @param int      $left
     * @param int|null $right
     *
     * @return \PlanB\Utils\Cli\Paragraph
     */
    public function padding(int $left, ?int $right = null): self
    {

        $this->renderer->padding($left, $right);
        $this->paddingLength = ($left + $right) * strlen(Renderer::TAB);

        return $this;
    }

    /**
     * Devuelve la longitud máxima
     *
     * @return int
     */
    public function getMaxLenght(): int
    {
        return $this->lines->reduce(function (Text $text, $max) {

            $cleanContent = strip_tags($text->stringify());
            $length = strlen($cleanContent) + $this->paddingLength;

            return max([$length, $max]);
        }, 0);
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
