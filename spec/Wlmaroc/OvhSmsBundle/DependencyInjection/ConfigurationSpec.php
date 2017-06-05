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

/**
 * Configuration Spec.
 *
 * @author Web Logiciel Maroc <contact@wlmaroc.com>
 */
class ConfigurationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Wlmaroc\OvhSmsBundle\DependencyInjection\Configuration');
        $this->shouldImplement('Symfony\Component\Config\Definition\ConfigurationInterface');
    }

    function it_creates_config_tree_builder()
    {
        $this->getConfigTreeBuilder()->shouldHaveType('Symfony\Component\Config\Definition\Builder\TreeBuilder');
    }
}
