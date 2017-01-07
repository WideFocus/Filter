<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Filter\Tests\TestDouble;

use WideFocus\Filter\ConfigurableFilterInterface;
use WideFocus\Filter\ConfigurableFilterTrait;

class ConfigurableFilterDouble implements ConfigurableFilterInterface
{
    use ConfigurableFilterTrait;

    /**
     * @var mixed
     */
    private $someParameter;

    /**
     * @var mixed
     */
    private $someOtherParameter;

    /**
     * Validate a value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function __invoke($value): bool
    {
        return true;
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function setSomeParameter($value)
    {
        $this->someParameter = $value;
    }

    /**
     * @return mixed
     */
    public function getSomeParameter()
    {
        return $this->someParameter;
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function setSomeOtherParameter($value)
    {
        $this->someOtherParameter = $value;
    }

    /**
     * @return mixed
     */
    public function getSomeOtherParameter()
    {
        return $this->someOtherParameter;
    }
}
