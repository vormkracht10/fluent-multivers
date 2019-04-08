<?php

namespace Vormkracht10\FluentMultivers\Domain\Journal\Queries;

use Vormkracht10\FluentMultivers\Services\Builder;
use Vormkracht10\FluentMultivers\Services\Attributes;

class CreateQuery extends Builder
{
    use Attributes;

    public function __construct(array $attributes)
    {
        $this->builder('Journal');
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
            $attributes['accountId'],
            $attributes['JournalId'],
            $attributes['fiscalYear']
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
