<?php

/**
 * This file is part of the planb project.
 *
 * (c) jmpantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PlanB\Console\Message\Style;

use PlanB\Type\Text\Text;

/**
 * Representa al espacio en blanco alrededor de un texto
 */
class HorizontalSpace
{
    /**
     * @var int
     */
    private $left = 0;

    /**
     * @var int
     */
    private $right = 0;

    /**
     * HorizontalSpace named constructor.
     *
     * @param int      $left
     * @param int|null $right
     *
     * @return \PlanB\Console\Message\Style\HorizontalSpace
     */
    public static function create(int $left = 0, ?int $right = null): HorizontalSpace
    {
        if (is_null($right)) {
            $right = $left;
        }

        return new static($left, $right);
    }

    /**
     * HorizontalSpace constructor.
     *
     * @param int $left
     * @param int $right
     */
    private function __construct(int $left, int $right)
    {
        $this->setLeft($left);
        $this->setRight($right);
    }

    /**
     * Asigna el número de espacios para la izquierda
     *
     * @param int $left
     *
     * @return \PlanB\Console\Message\Style\HorizontalSpace
     */
    private function setLeft(int $left): self
    {
        ensure_number($left)->isNotNegative();
        $this->left = $left;

        return $this;
    }

    /**
     * Asigna el número de espacios para la derecha
     *
     * @param int $right
     *
     * @return \PlanB\Console\Message\Style\HorizontalSpace
     */
    private function setRight(int $right): self
    {
        ensure_number($right)->isNotNegative();
        $this->right = $right;

        return $this;
    }


    /**
     * Devuelve el espaciado a la izquierda
     *
     * @return string
     */
    public function left(): string
    {
        return str_repeat(Text::BLANK_TEXT, $this->left);
    }

    /**
     * Devuelve el espaciado a la derecha
     *
     * @return string
     */
    public function right(): string
    {
        return str_repeat(Text::BLANK_TEXT, $this->right);
    }

    /**
     * Devuelve el resultado de mezclar este objeto con otro
     *
     * @param \PlanB\Console\Message\Style\HorizontalSpace $space
     *
     * @return \PlanB\Console\Message\Style\HorizontalSpace
     */
    public function merge(HorizontalSpace $space): HorizontalSpace
    {
        return self::create(
            $this->left + $space->left,
            $this->right + $space->right
        );
    }

    /**
     * Devuelve la longitud total
     *
     * @return int
     */
    public function lenght(): int
    {
        return $this->left + $this->right;
    }
}
