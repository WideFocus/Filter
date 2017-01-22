<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Filter\Tests;

use PHPUnit_Framework_TestCase;
use WideFocus\Filter\Tests\TestDouble\ConfigurableFilterDouble;

/**
 * @coversDefaultClass \WideFocus\Filter\ConfigurableFilterTrait
 */
class ConfigurableFilterTraitTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param array $parameters
     * @param array $expected
     *
     * @return void
     *
     * @dataProvider parametersProvider
     *
     * @covers ::setParameters
     * @covers ::snakeToCamelCase
     */
    public function testSetParameters(array $parameters, array $expected)
    {
        $filter = new ConfigurableFilterDouble();
        $filter->setParameters($parameters);

        foreach ($expected as $method => $value) {
            $this->assertEquals($value, call_user_func([$filter, $method]));
        }
    }

    /**
     * @return array
     */
    public function parametersProvider(): array
    {
        return [
            'snake_cased' => [
                [
                    'some_parameter' => 'foo',
                    'some_unknown_parameter' => 'quu'
                ],
                [
                    'getSomeParameter' => 'foo',
                    'getSomeOtherParameter' => null
                ]
            ],
            'camel_cased' => [
                [
                    'someParameter' => 'foo',
                    'someUnknownParameter' => 'quu'
                ],
                [
                    'getSomeParameter' => 'foo',
                    'getSomeOtherParameter' => null
                ]
            ],
            'overwrite' => [
                [
                    'someParameter' => 'foo',
                    'some_parameter' => 'bar'
                ],
                [
                    'getSomeParameter' => 'bar'
                ]
            ]
        ];
    }
}
