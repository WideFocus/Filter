<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Filter;

/**
 * Interface for filters that can be configured.
 */
interface ConfigurableFilterInterface extends FilterInterface
{
    /**
     * Set the parameters.
     *
     * @param array $parameters
     *
     * @return void
     */
    public function setParameters(array $parameters);
}