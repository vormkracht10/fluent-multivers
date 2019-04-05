<?php

namespace Vormkracht10\FluentMultivers\Domain\Customer\Queries\Invoice;

use Vormkracht10\FluentMultivers\Services\Builder;

class IndexQuery extends Builder
{
    public function fiscalYearOrFail(int $year, int $state = 0): array
    {
        return $this->builder('SupplierInvoiceInfoList/ByFiscalYear/'.$year.'/'.$state)->get();
    }

    public function findOrFail(string $id): array
    {
        return $this->builder('SupplierInvoice/'.$id)->get();
    }
}
