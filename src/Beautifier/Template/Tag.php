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

use PlanB\Beautifier\Style\StyleType;

/**
 * Utilidad para extraer el nombre del estilo, y la key de un tag
 */
class Tag
{

    private const TAG_PATTERN = '/<(?<style>\w+)(:(?<key>\w+))?>/s';

    /**
     * @var null|string
     */
    private $key;

    /**
     * @var string
     */
    private $style;

    /**
     * Tag named constructor.
     *
     * @param string $token
     *
     * @return \PlanB\Beautifier\Template\Tag
     */
    public static function make(string $token): Tag
    {
        return new static($token);
    }

    /**
     * Tag constructor.
     *
     * @param string $token
     */
    protected function __construct(string $token)
    {
        $matches = [];
        $defaults = ['style' => null, 'key' => null];

        preg_match(self::TAG_PATTERN, $token, $matches);

        $matches = array_replace($defaults, $matches);

        $this->style = $matches['style'];
        $this->key = $matches['key'];
    }

    /**
     * Indica si el tag está compuesto por un par style - key
     *
     * @return bool
     */
    private function isComplete(): bool
    {
        return !is_null($this->key) && !is_null($this->style);
    }

    /**
     * Devuelve el nombre del estilo
     *
     * @return string
     */
    public function style(): string
    {
        return $this->isComplete() ?
            $this->style :
            StyleType::DEFAULT;
    }

    /**
     * Devuelve la key
     *
     * @return null|string
     */
    public function key(): ?string
    {
        return $this->key ?? $this->style ?? null;
    }
}
