<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Filter;

use ArrayAccess;

/**
 * Interface for filters that can use context.
 */
interface ContextAwareFilterInterface extends FilterInterface
{
    /**
     * Set the context to use while filtering.
     *
     * @param ArrayAccess $context
     *
     * @return FilterInterface
     */
    public function setContext(ArrayAccess $context);
}
