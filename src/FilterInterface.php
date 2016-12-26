<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Filter;

use ArrayAccess;

/**
 * Filters values.
 */
interface FilterInterface
{
    /**
     * Filter a value.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function __invoke($value);

    /**
     * Set the parameters.
     *
     * @param array $parameters
     *
     * @return FilterInterface
     */
    public function setParameters(array $parameters): FilterInterface;

    /**
     * Set the context to be used during filtering.
     *
     * @param ArrayAccess $context
     *
     * @return FilterInterface
     */
    public function setContext(ArrayAccess $context): FilterInterface;
}
