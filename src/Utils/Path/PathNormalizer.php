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
 * Construye una ruta normalizada a partir de uno o varios segmentos
 *
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
     * Crea una nueva instancia
     *
     * @return \PlanB\Utils\Path\PathNormalizer
     */
    public static function newInstance(): self
    {
        return new self();
    }

    /**
     * PathNormalizer constructor.
     *
     * @param string[] ...$pieces
     */
    private function __construct(string ...$pieces)
    {
        $this->stack = [];

        $this->configureSlashPrefix($pieces);
        $this->collect(...$pieces);
    }

    /**
     * Configura el normalizer para tratar con rutas absolutas
     *
     * @param string[] $pieces
     *
     * @return \PlanB\Utils\Path\PathNormalizer
     */
    private function configureSlashPrefix(array $pieces): self
    {
        $first = array_shift($pieces);

        $pattern = sprintf('#^%s#', DIRECTORY_SEPARATOR);
        if (preg_match($pattern, $first)) {
            $this->prefix .= DIRECTORY_SEPARATOR;
        }

        return $this;
    }

    /**
     * Añade segmentos a la ruta
     *
     * @param string[] ...$pieces
     *
     * @return \PlanB\Utils\Path\PathNormalizer
     */
    private function collect(string ...$pieces): self
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
     *
     * @param string $segment
     *
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
     *
     * @return bool
     */
    private function isNotEmpty(string $piece): bool
    {

        $isEmpty = isBlankText($piece);
        $isDot = ('.' === $piece);

        return !($isEmpty || $isDot);
    }


    /**
     * Añade un segmento a la ruta
     *
     * @param string $piece
     *
     * @return \PlanB\Utils\Path\PathNormalizer
     *
     * @throws \PlanB\Utils\Path\Exception\OverFlowRootDirException
     */
    private function add(string $piece): self
    {
        if ($this->overFlowRootDir($piece)) {
            throw OverFlowRootDirException::create();
        }

        if ($this->isParentDirectory($piece)) {
            array_pop($this->stack);

            return $this;
        }

        array_push($this->stack, $piece);

        return $this;
    }

    /**
     * Indica si añadiendo un segmento se rebasa el directorio raiz
     *
     * @param string $piece
     *
     * @return bool
     */
    private function overFlowRootDir(string $piece): bool
    {

        $isEmpty = (0 === count($this->stack));

        return $isEmpty && $this->isParentDirectory($piece);
    }

    /**
     * Indica si un segmento es el directorio padre (..)
     *
     * @param string $piece
     *
     * @return bool
     */
    private function isParentDirectory(string $piece): bool
    {
        return '..' === $piece;
    }

    /**
     * Instancia un objeto PathNormalizer
     *
     * @param string[] ...$pieces segmentos que componen la ruta
     *
     * @return string
     */
    public static function normalize(string ...$pieces): string
    {
        return (new self(...$pieces))->toString();
    }

    /**
     * Devuelve la ruta normalizada
     *
     * @return string
     */
    protected function toString(): string
    {
        $normalized = sprintf('%s%s', $this->prefix, implode(DIRECTORY_SEPARATOR, $this->stack));

        return trim($normalized);
    }
}
