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

namespace PlanB\Beautifier\Template;

use Ds\Map;
use PlanB\Beautifier\Style\Style;
use PlanB\Beautifier\Style\StyleFactory;
use PlanB\Beautifier\Style\StyleType;
use PlanB\Type\Data\Data;

/**
 * Representa a una unidad de texto, a la que se le puede aplicar un estilo
 */
class Token
{


    /**
     * @var \Ds\Map
     */
    private $replacements;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $style;
    /**
     * @var string
     */
    private $original;

    /**
     * @var int
     */
    private $lineWidth = 0;

    /**
     * Line constructor.
     *
     * @param string  $token
     *
     * @param \Ds\Map $replacements
     *
     * @return \PlanB\Beautifier\Template\Token
     */
    public static function make(string $token, Map $replacements): self
    {
        return new static($token, $replacements);
    }

    /**
     * Line constructor.
     *
     * @param string  $token
     * @param \Ds\Map $replacements
     */
    protected function __construct(string $token, Map $replacements)
    {
        $this->replacements = $replacements;

        $this->initialize($token);
    }

    /**
     * Establece las propiedades de este objeto
     *
     * @param string $token
     */
    protected function initialize(string $token): void
    {
        $tag = Tag::make($token);

        $this->original = $token;
        $this->style = $tag->style();
        $this->key = $tag->key();
    }

    /**
     * Asigna el ancho máximo de linea
     *
     * @param int $width
     *
     * @return \PlanB\Beautifier\Template\Token
     */
    public function setLineWidth(int $width): self
    {
        $this->lineWidth = $width;

        return $this;
    }

    /**
     * Devuelve el estilo
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public function style(): Style
    {
        $type = StyleType::get($this->style);

        return StyleFactory::factory($type)
            ->lineWidth($this->lineWidth);
    }

    /**
     * Devuelve el valor
     *
     * @return null|string
     */
    public function value(): ?string
    {
        if (is_null($this->key)) {
            return $this->original;
        }

        $value = $this->replacements->get($this->key, null);

        return $this->convertToString($value);
    }

    /**
     * Nos aseguramos que "value" es una cadena de texto
     *
     * @param mixed $value
     *
     * @return string
     */
    private function convertToString($value): string
    {
        $data = Data::make($value);

        return $data->stringify();
    }

    /**
     * Devuelve el ancho del token
     *
     * @return int
     */
    public function width(): int
    {
        $lines = explode("\n", $this->value());
        $width = [];

        foreach ($lines as $line) {
            $raw = strip_tags($line);
            $width[] = strlen(trim($raw));
        }

        return max($width);
    }
}
