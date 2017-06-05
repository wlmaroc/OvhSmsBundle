<?php

/*
 * This file is part of the WlmarocOvhSmsBundle package.
 *
 * (c) Web Logiciel Maroc <contact@wlmaroc.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Wlmaroc\OvhSmsBundle;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * WlmarocOvhSmsBundle Spec.
 *
 * @author Web Logiciel Maroc <contact@wlmaroc.com>
 */
class WlmarocOvhSmsBundleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Wlmaroc\OvhSmsBundle\WlmarocOvhSmsBundle');
        $this->shouldImplement('Symfony\Component\HttpKernel\Bundle\BundleInterface');
        $this->shouldImplement('Symfony\Component\DependencyInjection\ContainerAwareInterface');
    }
}
