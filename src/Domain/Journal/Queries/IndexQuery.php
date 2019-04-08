<?php

namespace Vormkracht10\FluentMultivers\Domain\Journal\Queries;

use Vormkracht10\FluentMultivers\Services\Builder;

class IndexQuery extends Builder
{
    public function all(): array
    {
        return $this->builder('JournalInfoList')->get();
    }

    public function fiscalYearOrFail(int $year): array
    {
        return $this->builder('JournalInfoList?fiscalYear='.$year)->get();
    }

    public function findOrFail(string $id): array
    {
        return $this->builder('JournalInfo/'.$id)->get();
    }
}
