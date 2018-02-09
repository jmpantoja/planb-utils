<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace PlanB\Utils\Path;

use PlanB\Utils\Path\Exception\OverFlowRootDirException;

/**
 * Construye una ruta a partir de varios segmentos
 *
 * @package PlanB\Utils\Path
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
final class PathNormalizer
{
    /**
     * @var string[] $stack ;
     */
    private $stack = [];

    /**
     * @var string $prefix
     */
    private $prefix = '';

    /**
     * PathNormalizer constructor.
     * @param string[] $pieces
     */
    private function __construct(string ...$pieces)
    {
        $this->stack = [];

        $this->calculePrefix($pieces[0] ?? '');
        $this->append(...$pieces);
    }

    /**
     * Instancia un objeto PathNormalizer
     *
     * @param string[] $pieces segmentos que componen la ruta
     *
     * @return \PlanB\Utils\Path\PathNormalizer
     */
    public static function create(string ...$pieces): self
    {
        return new self(...$pieces);
    }

    /**
     * Comprueba si la ruta debe ser tratada como absoluta
     *
     * @param string $piece
     * @return \PlanB\Utils\Path\PathNormalizer
     */
    private function calculePrefix(string $piece): self
    {
        $pattern = sprintf('#^%s#', DIRECTORY_SEPARATOR);
        if (preg_match($pattern, $piece)) {
            $this->prefix = DIRECTORY_SEPARATOR;
        }
        return $this;
    }

    /**
     * Añade segmentos a la ruta
     *
     * @param string[] $pieces
     * @return \PlanB\Utils\Path\PathNormalizer
     */
    public function append(string ...$pieces): self
    {
        foreach ($pieces as $piece) {
            $parts = $this->getPartsFromSegment($piece);
            foreach ($parts as $part) {
                $this->add($part);
            }
        }
        return $this;
    }

    /**
     * Separa un segmento en varias partes, cortando por DIRECTORY_SEPARATOR
     * @param string $segment
     * @return string[]
     */
    private function getPartsFromSegment(string $segment): array
    {
        $parts = explode(DIRECTORY_SEPARATOR, $segment);
        return array_filter($parts, function ($part) {
            return $this->isNotEmpty($part);
        });
    }

    /**
     * Indica si no se trata de un segmento vacio
     * Consideramos segmentos vacios a tambien al directorio actual (.)
     *
     * @param string $piece
     * @return bool
     */
    private function isNotEmpty(string $piece): bool
    {
        $isEmpty = empty($piece);
        $isDot = ($piece === '.');

        return !($isEmpty || $isDot);
    }


    /**
     * Añade un segmento a la ruta
     *
     * @param string $piece
     * @return \PlanB\Utils\Path\PathNormalizer
     * @throws \PlanB\Utils\Path\Exception\OverFlowRootDirException
     */
    private function add(string $piece): self
    {
        if ($this->overFlowRootDir($piece)) {
            throw OverFlowRootDirException::create();
        }

        if ($this->isParentDirectory($piece)) {
            array_pop($this->stack);
        } else {
            array_push($this->stack, $piece);
        }

        return $this;
    }

    /**
     * Indica si añadiendo un segmento se rebasa el directorio raiz
     *
     * @param string $piece
     * @return bool
     */
    private function overFlowRootDir(string $piece): bool
    {
        return empty($this->stack) && $this->isParentDirectory($piece);
    }

    /**
     * Indica si un segmento es el directorio padre (..)
     *
     * @param string $piece
     * @return bool
     */
    private function isParentDirectory(string $piece): bool
    {
        return $piece === '..';
    }


    /**
     * Devuelve la ruta normalizada
     *
     * @return string
     */
    public function build(): string
    {
        return sprintf('%s%s', $this->prefix, implode(DIRECTORY_SEPARATOR, $this->stack));
    }
}
