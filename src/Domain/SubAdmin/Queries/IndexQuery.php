<?php

namespace Vormkracht10\FluentMultivers\Domain\SubAdmin\Queries;

use Vormkracht10\FluentMultivers\Services\Builder;

class IndexQuery extends Builder
{
    public function all(): array
    {
        return $this->builder('SubAdminInfoList')->get();
    }

    public function findOrFail(string $id): array
    {
        return $this->builder('SubAdminInfo/'.$id)->get();
    }
}
