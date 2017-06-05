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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * {@inheritdoc}
 *
 * @author Web Logiciel Maroc <contact@wlmaroc.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('wlmaroc_ovh');
        $rootNode
            ->children()
                ->scalarNode('application_key')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('application_secret')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('endpoint_name')->defaultValue('ovh-eu')->cannotBeEmpty()->end()
                ->scalarNode('consumer_key')->isRequired()->cannotBeEmpty()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
