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

namespace PlanB\Beautifier\Parser;

use PlanB\Beautifier\Format\FormatInterface;
use PlanB\Beautifier\Parser\Decorator\DecoratorInterface;
use PlanB\Beautifier\Template\Paragraph;
use PlanB\Beautifier\Template\Token;

/**
 * Aplica estilo a una template
 */
class Parser
{

    protected const TAG_PATTERN = '/<(?<style>\w+)(:(?<name>\w+))?>/s';

    /**
     * @var \PlanB\Beautifier\Parser\Decorator\DecoratorInterface[]
     */
    private $decorators = [];

    /**
     * Parser constructor.
     *
     * @return \PlanB\Beautifier\Parser\Parser
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * Parser constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Añade un nuevo decorator
     *
     * @param \PlanB\Beautifier\Parser\Decorator\DecoratorInterface $decorator
     *
     * @return \PlanB\Beautifier\Parser\Parser
     */
    public function addDecorator(DecoratorInterface $decorator): self
    {
        $this->decorators[] = $decorator;

        return $this;
    }

    /**
     * Devuelve un array con los decorators
     *
     * @return \PlanB\Beautifier\Parser\Decorator\DecoratorInterface[]
     */
    public function getDecorators(): array
    {
        return $this->decorators;
    }

    /**
     * Devuelve una template parseada
     *
     * @param string   $template
     * @param string[] $replacements
     *
     * @return string
     */
    public function parse(string $template, array $replacements = []): string
    {
        $paragraph = Paragraph::make($template, $replacements);

        return $paragraph->parse([$this, 'decorate']);
    }

    /**
     * Devuelve un dumper parseado
     *
     * @param \PlanB\Beautifier\Format\FormatInterface $format
     *
     * @return string
     */
    public function format(FormatInterface $format): string
    {

        $template = $format->getTemplate();
        $replacements = $format->getReplacements();

        return $this->parse($template, $replacements);
    }

    /**
     * Devuelve un token parseado
     *
     * @param \PlanB\Beautifier\Template\Token $token
     *
     * @return string
     */
    public function decorate(Token $token): string
    {
        $style = $token->style();
        $value = $token->value();

        foreach ($this->decorators as $decorator) {
            $value = $decorator->decorate($style, $value);
        }

        return $value;
    }
}
