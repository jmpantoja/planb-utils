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

namespace PlanB\Console\Message\Style;

/**
 * Define a la posición del texto respecto al párrafo
 */
class Position
{
    /**
     * @var int
     */
    private $width;

    /**
     * @var \PlanB\Console\Message\Style\Align
     */
    private $align;

    /**
     * Position named constructor.
     *
     * @param int                                       $width
     * @param \PlanB\Console\Message\Style\Align|string $align
     *
     * @return \PlanB\Console\Message\Style\Position
     */
    public static function create(int $width = 0, $align = null): Position
    {
        if (is_null($align)) {
            $align = Align::DEFAULT();
        }

        return new static($width, $align);
    }

    /**
     * Position constructor.
     *
     * @param int                                       $width
     * @param \PlanB\Console\Message\Style\Align|string $align
     */
    private function __construct(int $width, $align)
    {
        $this->setWidth($width);
        $this->setAlign($align);
    }

    /**
     * Crea una nueva instancia a partir de una existente
     *
     * @param \PlanB\Console\Message\Style\Position $position
     *
     * @return \PlanB\Console\Message\Style\Position
     */
    public function blend(Position $position): Position
    {
        $align = $this->getAlign();
        if ($align->isDefault()) {
            $align = $position->getAlign();
        }

        return new static($position->getWidth(), $align);
    }

    /**
     * Devuelve el ancho
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Asigna el ancho
     *
     * @param int $width
     *
     * @return \PlanB\Console\Message\Style\Position
     */
    private function setWidth(int $width): Position
    {
        ensure_number($width)->isNotNegative();

        $this->width = $width;

        return $this;
    }

    /**
     * Devuelve la alineación
     *
     * @return \PlanB\Console\Message\Style\Align
     */
    public function getAlign(): Align
    {
        return $this->align;
    }

    /**
     * Asigna la alineación
     *
     * @param mixed|string|\PlanB\Console\Message\Style\Align $align
     *
     * @return \PlanB\Console\Message\Style\Position
     */
    private function setAlign($align): Position
    {
        $this->align = Align::get($align);

        return $this;
    }
}
