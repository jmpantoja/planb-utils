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

namespace spec\PlanB\Utils\Options\Fake;


use PlanB\Utils\Options\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FakeOptions extends Options
{
    /**
     * @inheritDoc
     */
    public const POSITIVE_PROFILE = 'positive-numbers';

    public function customize(): void
    {
        parent::customize();

        $this->addProfile(self::POSITIVE_PROFILE, [$this, 'configurePositive']);

    }

    public function configure(OptionsResolver $resolver): void
    {
        $this->configureColor($resolver);
        $this->configureNumber($resolver);
    }

    public function configurePositive(OptionsResolver $resolver): void
    {

        $this->configure($resolver);

        $resolver->setAllowedValues('number', function ($value) {
            return $value > 0;
        });

    }

    /**
     * @param OptionsResolver $resolver
     */
    protected function configureColor(OptionsResolver $resolver): void
    {
        $resolver->setDefined('color');

        $resolver->setAllowedValues('color', ['rojo', 'verde', 'azul']);
        $resolver->setAllowedTypes('color', ['string']);

        $resolver->setNormalizer('color', function (OptionsResolver $resolver, string $value) {
            return strtoupper($value);
        });
    }

    /**
     * @param OptionsResolver $resolver
     */
    protected function configureNumber(OptionsResolver $resolver): void
    {
        $resolver->setDefined('number');
        $resolver->setAllowedTypes('number', ['numeric']);
    }
}
