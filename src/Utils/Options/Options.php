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

namespace PlanB\Utils\Options;

use PlanB\DS\ArrayList\Utilities\CollectionBuilder;
use PlanB\Utils\Options\Exception\UndefinedProfileException;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Clase base para configurar un OptionResolver
 */
abstract class Options
{

    /**
     * El perfil por defecto
     */
    public const DEFAULT_PROFILE = 'default';


    /**
     * @var \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    private $resolver;

    /**
     * @var string $currentProfile
     */
    private $currentProfile;

    /**
     * @var \PlanB\Utils\Collection\Collection
     */
    private $profiles;

    /**
     * Crea una instancia para un perfil determinado
     *
     * @param string $profile
     *
     * @return \PlanB\Utils\Options\Options
     */
    public static function create(string $profile = self::DEFAULT_PROFILE): Options
    {
        return new static($profile);
    }


    /**
     * Options constructor.
     *
     * @param string $profile
     */
    protected function __construct(string $profile = self::DEFAULT_PROFILE)
    {
        $this->profiles = CollectionBuilder::fromType('callable');

        $this->addProfile(self::DEFAULT_PROFILE, [$this, 'configure']);
        $this->customize();

        $this->setCurrentProfile($profile);
    }

    /**
     * Devuelve el perfil actual
     *
     * @return string
     */
    public function getCurrentProfile(): string
    {
        return $this->currentProfile;
    }

    /**
     * Asigna el perfil
     *
     * @param string $name
     *
     * @return \PlanB\Utils\Options\Options
     */
    private function setCurrentProfile(string $name): self
    {
        if (!$this->profiles->has($name)) {
            throw UndefinedProfileException::forProfile($name);
        }

        $this->resolver = null;
        $this->currentProfile = $name;

        return $this;
    }


    /**
     * Este método se usa para añadir perfiles, si fuera necesario
     *
     * ´´´
     * $this->>addProfile('profileA', function(OptionResolver $resolver){
     * });
     *
     * $this->>addProfile('profileB', [$this, 'configureProfileB']);
     *
     *´´´
     */
    public function customize(): void
    {
    }

    /**
     * Añade un profile al stack
     *
     * @param string   $name
     * @param callable $callback
     *
     * @return \PlanB\Utils\Options\Options
     */
    public function addProfile(string $name, callable $callback): self
    {
        $this->profiles->set($name, $callback);

        return $this;
    }

    /**
     * Devuelve el dataset validado y normalizado
     *
     * @param mixed[] $options
     *
     * @return mixed[]
     */
    public function resolve(array $options): array
    {
        $resolver = $this->getResolver();

        return $resolver->resolve($options);
    }

    /**
     * Devuelve el optionsResolver
     * si no existe, lo crea y configura
     *
     * @return \Symfony\Component\OptionsResolver\OptionsResolver
     */
    private function getResolver(): OptionsResolver
    {
        if (!is_null($this->resolver)) {
            return $this->resolver;
        }

        $this->resolver = $this->buildResolver();

        return $this->resolver;
    }


    /**
     * Devuelve un objeto OptionResolver configurado el perfil actual
     *
     * @return \Symfony\Component\OptionsResolver\OptionsResolver
     */
    private function buildResolver(): OptionsResolver
    {
        $resolver = new OptionsResolver();
        $profile = $this->profiles->get($this->currentProfile);

        call_user_func($profile, $resolver);

        return $resolver;
    }

    /**
     * Añade criterios de validación al perfil por defecto
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    abstract public function configure(OptionsResolver $resolver): void;
}
