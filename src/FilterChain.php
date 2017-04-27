<?php
/**
 * Copyright WideFocus. See LICENSE.txt.
 * https://www.widefocus.net
 */

namespace WideFocus\Filter;

/**
 * Chains filters.
 */
class FilterChain implements ContextAwareFilterInterface
{
    use ContextAwareFilterTrait;

    /**
     * @var callable[]
     */
    private $filters;

    /**
     * Constructor.
     *
     * @param callable[] ...$filters
     */
    public function __construct(callable ...$filters)
    {
        $this->filters = $filters;
    }

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
}
