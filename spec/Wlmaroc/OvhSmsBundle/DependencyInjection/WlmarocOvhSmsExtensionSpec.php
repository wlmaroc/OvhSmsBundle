<?php

/*
 * This file is part of the WlmarocOvhSmsBundle package.
 *
 * (c) Web Logiciel Maroc <contact@wlmaroc.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Wlmaroc\OvhSmsBundle\DependencyInjection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * WlmarocOvhExtension Spec.
 *
 * @author Web Logiciel Maroc <contact@wlmaroc.com>
 */
class WlmarocOvhExtensionSpec extends ObjectBehavior
{
    const APPLICATION_KEY = 'ApplicationKey';
    const APPLICATION_SECRET = 'ApplicationSecret';
    const ENDPOINT_NAME = 'ovh-eu';
    const CONSUMER_KEY = 'ConsumerKey';

    function it_is_initializable()
    {
        $this->shouldHaveType('Wlmaroc\OvhSmsBundle\DependencyInjection\WlmarocOvhExtension');
        $this->shouldImplement('Symfony\Component\DependencyInjection\Extension\ConfigurationExtensionInterface');
        $this->shouldImplement('Symfony\Component\DependencyInjection\Extension\ExtensionInterface');
    }

    function it_loads(ContainerBuilder $container)
    {
        $container->setParameter('wlmaroc_ovh.application_key', self::APPLICATION_KEY)->shouldBeCalled();
        $container->setParameter('wlmaroc_ovh.application_secret', self::APPLICATION_SECRET)->shouldBeCalled();
        $container->setParameter('wlmaroc_ovh.endpoint_name', self::ENDPOINT_NAME)->shouldBeCalled();
        $container->setParameter('wlmaroc_ovh.consumer_key', self::CONSUMER_KEY)->shouldBeCalled();
        $container->hasExtension('http://symfony.com/schema/dic/services')->shouldBeCalled();
        $container->addResource(Argument::type('Symfony\Component\Config\Resource\FileResource'))->shouldBeCalled();
        $container->setDefinition('wlmaroc_ovh.api', Argument::type('Symfony\Component\DependencyInjection\Definition'))->shouldBeCalled();
        $container->setAlias('ovh', Argument::type('Symfony\Component\DependencyInjection\Alias'))->shouldBeCalled();

        $configs = array(
            array(
                'application_key' => self::APPLICATION_KEY,
                'application_secret' => self::APPLICATION_SECRET,
                'endpoint_name' => self::ENDPOINT_NAME,
                'consumer_key' => self::CONSUMER_KEY,
            )
        );

        $this->load($configs, $container);
    }
}
