<?php

namespace Vormkracht10\FluentMultivers\Domain\Customer\Queries;

use Vormkracht10\FluentMultivers\Services\Builder;

class IndexQuery extends Builder
{
    public function all(): array
    {
        return $this->builder('CustomerInfoList')->get();
    }

    public function findOrFail(string $id): array
    {
        return $this->builder('Customer/'.$id)->get();
    }
}
