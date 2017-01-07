<?php
/**
 * Copyright WideFocus. All rights reserved.
 * http://www.widefocus.net
 */

namespace WideFocus\Filter\Tests\TestDouble;

use ArrayAccess;
use WideFocus\Filter\ContextAwareFilterInterface;
use WideFocus\Filter\ContextAwareFilterTrait;

class ContextAwareFilterDouble implements ContextAwareFilterInterface
{
    use ContextAwareFilterTrait;

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
     * @return ArrayAccess|null
     */
    public function peekContext()
    {
        if ($this->hasContext()) {
            return $this->getContext();
        }
        return null;
    }
}
