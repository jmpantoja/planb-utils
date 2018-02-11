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

class DummyOptions extends Options
{

    public function configure(OptionsResolver $resolver): void
    {
        $profile = $this->getProfile();

        switch ($profile) {
            case 'CUSTOM':
                $this->configureCustom($resolver);
                break;
            default:
                $this->configureStandard($resolver);
                break;
        }
    }

    public function configureStandard(OptionsResolver $resolver): void
    {
        $resolver->setRequired('value');
        $resolver->setAllowedValues('value', ['A', 'B', 'C']);
    }

    public function configureCustom(OptionsResolver $resolver): void
    {
        $resolver->setRequired('value');
        $resolver->setAllowedValues('value', ['X', 'Y', 'Z']);
    }
}