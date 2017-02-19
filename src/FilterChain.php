<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Filter;

/**
 * Chains filters.
 */
class FilterChain implements FilterChainInterface, ContextAwareFilterInterface
{
    use ContextAwareFilterTrait;

    /**
     * @var callable
     */
    private $filters;

    /**
     * Filter a value.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function __invoke($value)
    {
        foreach ($this->filters as $filter) {
            if ($filter instanceof ContextAwareFilterInterface
                && $this->hasContext()
            ) {
                $filter->setContext($this->getContext());
            }
            $value = call_user_func($filter, $value);
        }
        return $value;
    }

    /**
     * Add a filter to the chain.
     *
     * @param callable $filter
     *
     * @return void
     */
    public function addFilter(callable $filter)
    {
        $this->filters[] = $filter;
    }
}
