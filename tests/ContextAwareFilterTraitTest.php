<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Filter\Tests;

use ArrayAccess;
use PHPUnit_Framework_TestCase;
use WideFocus\Filter\Tests\TestDouble\ContextAwareFilterDouble;

/**
 * @coversDefaultClass \WideFocus\Filter\ContextAwareFilterTrait
 */
class ContextAwareFilterTraitTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param ArrayAccess|null $context
     *
     * @return void
     *
     * @dataProvider contextProvider
     *
     * @covers ::setContext
     * @covers ::hasContext
     * @covers ::getContext
     */
    public function testSetContext(ArrayAccess $context = null)
    {
        $filter = new ContextAwareFilterDouble();
        if ($context !== null) {
            $filter->setContext($context);
        }
        $this->assertSame($context, $filter->peekContext());
    }

    /**
     * @return array
     */
    public function contextProvider(): array
    {
        return [
            [
                $this->createMock(ArrayAccess::class)
            ],
            [
                null
            ]
        ];
    }
}
