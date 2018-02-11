<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace PlanB\Utils\Options;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Valida y normaliza un array con suerte a unos criterios
 *
 * @package PlanB\Utils\Options
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
abstract class Options
{

    /**
     * El perfil por defecto
     */
    private const DEFAULT_PROFILE = 'standard';

    /**
     * @var \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    private $resolver;

    /**
     * @var string $profile
     */
    private $profile;

    /**
     * Options constructor.
     *
     * @param string $profile
     */
    final private function __construct(string $profile)
    {
        $this->profile = $profile;
    }


    /**
     * Devuelve el perfil que hay que usar para la configuración
     *
     * Es una forma de poder discriminar, sobreescribiendo el método profile, para llamar al método configure
     * que sea necesario para cada caso
     *
     * @return string
     */
    public function getProfile(): string
    {
        return $this->profile;
    }


    /**
     * Crea una instancia para un perfil determinado
     *
     * @param string $profile
     * @return \PlanB\Utils\Options\Options
     */
    public static function create(string $profile = self::DEFAULT_PROFILE): Options
    {
        return self::newInstance($profile);
    }

    /**
     * Crea una instancia
     *
     * @param string $profile
     * @return \PlanB\Utils\Options\Options
     */
    private static function newInstance(string $profile): Options
    {
        $className = get_called_class();
        return new $className($profile);
    }


    /**
     * Añade criterios de validación a cada perfil
     *
     * Para mantener varios perfiles hacer:
     *
     * $profile = $this->getProfile();
     * switch($profile){
     *   case 'A':
     *      $this->configureProfileA($resolver);
     *      break;
     *   default:
     *      $this->configure($resolver);
     *      break;
     * }
     *
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    abstract public function configure(OptionsResolver $resolver): void;

    /**
     * Devuelve el array normalizado
     *
     * @param mixed[] $options
     * @return mixed[]
     */
    public function resolve(array $options = []): array
    {
        $resolver = $this->getResolver();
        return $resolver->resolve($options);
    }

    /**
     * Devuelve el optionsResolver
     * si no existe, lo crea e inicializa
     *
     * @return \Symfony\Component\OptionsResolver\OptionsResolver
     */
    private function getResolver(): OptionsResolver
    {
        if (empty($this->resolver)) {
            $resolver = new OptionsResolver();
            $this->configure($resolver);
            $this->resolver = $resolver;
        }
        return $this->resolver;
    }

    /**
     * Aplica el método resolve a cada elemento de un array
     * Sirve para validar varios juegos de datos de una vez
     *
     * @param mixed[] $collection
     * @return mixed[]
     */
    public function map(array $collection): array
    {
        return array_map(function (array $options) {
            return $this->resolve($options);
        }, $collection);
    }
}
