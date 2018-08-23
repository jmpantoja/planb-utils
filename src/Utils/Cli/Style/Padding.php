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

namespace PlanB\Utils\Cli\Style;

/**
 * Define el padding de una linea
 */
class Padding
{
    /**
     * @var int
     */
    private $leftPadding = 0;
    /**
     * @var int
     */
    private $rightPadding = 0;

    /**
     * Padding named constructor.
     *
     * @param int      $left
     * @param int|null $right
     *
     * @return \PlanB\Utils\Cli\Style\Padding
     */
    public static function create(int $left = 0, ?int $right = null): Padding
    {

        if (is_null($right)) {
            $right = $left;
        }

        return new static($left, $right);
    }

    /**
     * Padding constructor.
     *
     * @param int $left
     * @param int $right
     */
    protected function __construct(int $left, int $right)
    {
        $this->leftPadding = $left;
        $this->rightPadding = $right;
    }

    /**
     * Devuelve el padding izquierdo
     *
     * @return string
     */
    public function getLeft(): string
    {
        return str_repeat(Style::TAB, $this->leftPadding);
    }

    /**
     * Devuelve el padding derecho
     *
     * @return string
     */
    public function getRight(): string
    {
        return str_repeat(Style::TAB, $this->rightPadding);
    }
}
