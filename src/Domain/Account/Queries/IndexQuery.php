<?php

namespace Vormkracht10\FluentMultivers\Domain\Account\Queries;

use Vormkracht10\FluentMultivers\Services\Builder;

class IndexQuery extends Builder
{
    public function fiscalYearOrFail(int $year): array
    {
        return $this->builder('AccountInfoList/'.$year)->get();
    }

    public function findOrFail(string $id): array
    {
        return $this->builder('AccountInfo/'.$id)->get();
    }
}
