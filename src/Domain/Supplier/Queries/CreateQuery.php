<?php

namespace Vormkracht10\FluentMultivers\Domain\Supplier\Queries;

use Vormkracht10\FluentMultivers\Services\Builder;
use Vormkracht10\FluentMultivers\Services\Attributes;

class CreateQuery extends Builder
{
    use Attributes;

    public function __construct(array $attributes)
    {
        $this->builder('Supplier');
        $this->attributes = $attributes;
    }

    /*
     * @return array|bool
     */
    public function save()
    {
        if ($this->validate($this->attributes)) {
            return $this->post();
        }

        return false;
    }

    public function validate(array $attributes): bool
    {
        return isset($attributes['ShortName']) && strlen($attributes['ShortName']) <= 8;
    }
}
