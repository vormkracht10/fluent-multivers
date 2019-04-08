<?php

namespace Vormkracht10\FluentMultivers\Domain\Account\Queries;

use Vormkracht10\FluentMultivers\Services\Builder;
use Vormkracht10\FluentMultivers\Services\Attributes;

class CreateQuery extends Builder
{
    use Attributes;

    public function __construct(array $attributes)
    {
        $this->builder('Account');
        $this->attributes = $attributes;
    }

    /*
     * @return array|bool
     */
    public function save()
    {
        if ($this->validAndFixed()) {
            return $this->post();
        }

        return false;
    }

    public function validate(array $attributes): bool
    {
        return isset(
            $attributes['AccountId'],
            $attributes['AccountType'],
            $attributes['fiscalYear'],
            $attributes['AuditionDescription']
        );
    }

    protected function validAndFixed(): bool
    {
        if ($this->validate($this->attributes)) {
            return true;
        }

        if (!isset($this->fiscalYear)) {
            $this->fiscalYear = date('Y');
        }

        return true;
    }
}
