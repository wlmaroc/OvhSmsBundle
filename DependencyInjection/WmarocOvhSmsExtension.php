<?php

/*
 * This file is part of the WlmarocOvhSmsBundle package.
 *
 * (c) Web Logiciel Maroc <contact@wlmaroc.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Wlmaroc\OvhSmsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * {@inheritdoc}
 *
 * @author Web Logiciel Maroc <contact@wlmaroc.com>
 */
class WlmarocOvhExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('wlmaroc_ovh.application_key', $config['application_key']);
        $container->setParameter('wlmaroc_ovh.application_secret', $config['application_secret']);
        $container->setParameter('wlmaroc_ovh.endpoint_name', $config['endpoint_name']);
        $container->setParameter('wlmaroc_ovh.consumer_key', $config['consumer_key']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
