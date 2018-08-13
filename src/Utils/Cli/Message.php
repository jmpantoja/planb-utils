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

use PlanB\DS\ItemList\TypedList;
use PlanB\Utils\Type\Type;
use PlanB\ValueObject\Stringifable;

/**
 * Un mensaje de texto, formateado para mostrarlo por consola
 */
class Message extends Output implements Stringifable, \Countable
{

    /**
     * @var int
     */
    private $maxLength = 0;

    /**
     * @var bool
     */
    private $expanded = false;

    /**
     * Message constructor.
     */
    protected function __construct()
    {
        parent::__construct();
        $this->lines = TypedList::ofType(Output::class)
            ->addHydrator(Type::STRING, function (string $content) {
                return Line::create($content);
            })
            ->addNormalizer(function (Output $line) {
                $this->maxLength = max([$this->maxLength, $line->length()]);

                return $line;
            });
    }

    /**
     * Message camed constructor.
     *
     * @return \PlanB\Utils\Cli\Message
     */
    public static function create(): Message
    {
        return new static();
    }


    /**
     * Devuelve el número de lineas que componen este mensaje
     *
     * @return int
     */
    public function count(): int
    {
        return $this->lines->count();
    }

    /**
     * __toString alias
     *
     * @param string $format
     *
     * @return string
     */
    public function stringify(?string $format = null): string
    {
        $width = $this->getWidth();
        $style = $this->getStyle()->width($width);

        return $this->render($style);
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
        $this->mergeStyle($style);
        $pieces = $this->lines->map(function (Output $output) {
            return $output->render($this->getStyle());
        });

        return implode("\n", $pieces->toArray());
    }

    /**
     * Devuelve el ancho de cada linea
     *
     * @return int
     */
    private function getWidth(): int
    {
        if (!$this->expanded) {
            return 0;
        }

        return $this->maxLength;
    }

    /**
     * Devuelve la cadena de texto
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->stringify();
    }


    /**
     * Añade una linea
     *
     * @param string $format
     * @param mixed  ...$arguments
     *
     * @return \PlanB\Utils\Cli\Message
     */
    public function add(string $format, ...$arguments): Output
    {

        $block = self::create();

        $content = sprintf($format, ...$arguments);
        $lines = explode("\n", $content);

        $block->lines->addAll($lines);
        $this->lines->add($block);

        return $block;
    }

    /**
     * Devuelve la longitud de la línea más larga (sin etiquetas)
     *
     * @return int
     */
    public function length(): int
    {
        return $this->maxLength;
    }

    /**
     * @return \PlanB\Utils\Cli\Message
     */
    public function expand(): self
    {
        $this->expanded = true;

        return $this;
    }
}
