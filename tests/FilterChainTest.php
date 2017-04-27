<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Filter\Tests;

use ArrayAccess;
use PHPUnit_Framework_TestCase;
use WideFocus\Filter\ContextAwareFilterInterface;
use WideFocus\Filter\FilterChain;
use WideFocus\Filter\FilterInterface;

/**
 * @coversDefaultClass \WideFocus\Filter\FilterChain
 */
class FilterChainTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     */
    public function testConstructor()
    {
        $this->assertInstanceOf(
            FilterChain::class,
            new FilterChain()
        );
    }

    /**
     * @return void
     *
     * @covers ::__invoke
     * @covers ::__construct
     */
    public function testInvoke()
    {
        $value   = 'foo';
        $context = $this->createMock(ArrayAccess::class);

        $callback = function ($value) {
            return $value;
        };

        $filter = $this->createMock(FilterInterface::class);
        $filter
            ->expects($this->once())
            ->method('__invoke')
            ->with($value)
            ->willReturn($value);

        $contextAwareFilter = $this->createMock(
            ContextAwareFilterInterface::class
        );
        $contextAwareFilter
            ->expects($this->once())
            ->method('setContext')
            ->with($context);

        $chain = new FilterChain($callback, $filter, $contextAwareFilter);
        $chain->setContext($context);

        $chain->__invoke($value);
    }
}
