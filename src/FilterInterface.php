<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Filter;

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
}
