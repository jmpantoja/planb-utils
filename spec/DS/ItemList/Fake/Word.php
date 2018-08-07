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

namespace spec\PlanB\DS\ItemList\Fake;

class Word
{
    private $text;

    private function __construct(string $text)
    {
        $this->text = $text;
    }

    public static function fromString(string $text): Word
    {
        return new static($text);
    }

    public function toUpper(): self
    {
        $this->text = strtoupper($this->text);
        return $this;
    }

    public function concat(string $text): self
    {
        $this->text = sprintf('%s %s', $this->text, $text);
        return $this;
    }

    public function concatAll(string ...$words): self
    {
        array_unshift($words, $this->text);

        $this->text = implode('/', $words);
        return $this;

    }

    public function length(): int
    {
        return strlen($this->text);
    }

    public function __toString()
    {
        return $this->text;
    }
}
