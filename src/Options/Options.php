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

        $resolver = new OptionsResolver();
        $this->initialize($resolver);

        $this->resolver = $resolver;
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
     * Incializa el objeto
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
    protected function initialize(OptionsResolver $resolver): void
    {
        $this->configure($resolver);
    }

    /**
     * Crea una instancia con el profile por defecto
     *
     * @return \PlanB\Utils\Options\Options
     */
    public static function default(): Options
    {
        return self::create();
    }

    /**
     * Crea una instancia con un profile personalizado
     *
     * @param string $profile
     * @return \PlanB\Utils\Options\Options
     */
    public static function custom(string $profile): Options
    {
        return self::create($profile);
    }

    /**
     * Crea una instancia
     *
     * @param string $profile
     * @return \PlanB\Utils\Options\Options
     */
    private static function create(string $profile = self::DEFAULT_PROFILE): Options
    {
        $className = get_called_class();
        return new $className($profile);
    }

    /**
     * Configura los criterios de validación
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     * @return mixed
     */
    abstract public function configure(OptionsResolver $resolver): void;

    /**
     * Devuelve el array normalizado
     *
     * @param mixed[] $options
     * @return mixed[]
     */
    public function resolve(array $options): array
    {
        return $this->resolver->resolve($options);
    }
}
