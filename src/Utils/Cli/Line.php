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

/**
 * Una linea singular del mensaje
 */
class Line extends Output
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $rawText;


    /**
     * Line constructor.
     *
     * @param string $content
     */
    protected function __construct(string $content)
    {
        parent::__construct();
        $this->text = $this->normalize($content);
        $this->rawText = $this->normalize(strip_tags($content));
    }

    /**
     * Devuelve el texto
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Normaliza el texto
     *
     * @param string $content
     *
     * @return string
     */
    private function normalize(string $content): string
    {
        $content = trim($content, "\n ");

        return $content = str_replace("\t", Style::TAB, $content);
    }

    /**
     * Line Named constructor.
     *
     * @param string $content
     *
     * @return \PlanB\Utils\Cli\Line
     */
    public static function create(string $content): self
    {
        return new static($content);
    }

    /**
     * Devuelve el ancho de la linea, sin contar etiquetas
     *
     * @return int
     */
    public function length(): int
    {
        return strlen($this->rawText);
    }

    /**
     * Devuelve la longitud del texto que no se imprime por formar parte de las etiquetas
     *
     * @return int
     */
    public function taggedTextLength(): int
    {
        return strlen($this->text) - $this->length();
    }

    /**
     * Devuelve el contenido expandido de esta linea, con el estilo aplicado
     *
     * @param \PlanB\Utils\Cli\Style $style
     *
     * @return  string
     */
    public function render(Style $style): string
    {
        return $style->decorate($this);
    }
}
