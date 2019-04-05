<?php

namespace Vormkracht10\FluentMultivers\Domain\Supplier\Queries;

use Vormkracht10\FluentMultivers\Services\Builder;

class IndexQuery extends Builder
{
    public function all(): array
    {
        return $this->builder('SupplierInfoList')->get();
    }

    public function findOrFail(string $id): array
    {
        return $this->builder('Supplier/'.$id)->get();
    }
}
