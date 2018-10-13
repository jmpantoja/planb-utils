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

use PlanB\Type\Data\Data;

/**
 * Clase base para templates
 */
abstract class Template
{
    /**
     * @var string[]
     */
    private $arguments;

    /**
     * @var string
     */
    private $pattern;

    /**
     * Template constructor.
     * @param Data $data
     * @param string $pattern
     */
    protected function __construct(Data $data, string $pattern)
    {
        $this->pattern = $pattern;

        $this->arguments = array_merge(
            $this->defaults($data),
            $this->extract($data)
        );
    }

    private function defaults(Data $data): array
    {
        return [
            'type' => $data->getType()->stringify()
        ];
    }

    /**
     * Devuelve un array de parejas clave/valor con la información
     * asociada a este template
     *
     * @param Data $data
     * @return string[]
     */
    abstract protected function extract(Data $data): array;


    public function render(): string
    {
        $keys = $this->getKeys();
        $values = $this->getValues();

        $pattern = $this->getPattern();

        return str_replace($keys, $values, $pattern);
    }

    protected function getPattern(): string
    {
        return $this->pattern;
    }

    private function getKeys(): array
    {
        $keys = [];
        $original = array_keys($this->arguments);

        foreach ($original as $key) {
            $keys[] = sprintf('%%%s%%', $key);
        }

        return $keys;
    }

    private function getValues(): array
    {
        return array_values($this->arguments);
    }
}
