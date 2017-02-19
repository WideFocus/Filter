<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Filter;

/**
 * Chains filters.
 */
interface FilterChainInterface extends FilterInterface
{
    /**
     * Add a filter to the chain.
     *
     * @param callable $filter
     *
     * @return void
     */
    public function addFilter(callable $filter);
}
