<?php

namespace Vormkracht10\FluentMultivers\Domain\VatCode\Queries;

use Vormkracht10\FluentMultivers\Services\Builder;

class IndexQuery extends Builder
{
    public function all(): array
    {
        return $this->builder('VatCodeInfoList')->get();
    }

    public function findOrFail(string $id): array
    {
        return $this->builder('VatCodeInfo/'.$id)->get();
    }
}
