<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Filter;

use ArrayAccess;

/**
 * Trait to implement ContextAwareFilterInterface.
 */
trait ContextAwareFilterTrait
{
    /**
     * @var ArrayAccess
     */
    private $context;

    /**
     * Set the context to use while filtering.
     *
     * @param ArrayAccess $context
     *
     * @return void
     */
    public function setContext(ArrayAccess $context)
    {
        $this->context = $context;
    }

    /**
     * Whether a context has been set.
     *
     * @return bool
     */
    protected function hasContext(): bool
    {
        return $this->context !== null;
    }

    /**
     * Get the context to use while filtering.
     *
     * @return ArrayAccess
     */
    protected function getContext(): ArrayAccess
    {
        return $this->context;
    }
}
