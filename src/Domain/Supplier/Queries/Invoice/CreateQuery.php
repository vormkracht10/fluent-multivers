<?php

namespace Vormkracht10\FluentMultivers\Domain\Supplier\Queries\Invoice;

use Vormkracht10\FluentMultivers\Services\Builder;
use Vormkracht10\FluentMultivers\Services\Attributes;

class CreateQuery extends Builder
{
    use Attributes;

    public function __construct(array $attributes)
    {
        $this->builder('SupplierInvoice');
        $this->attributes = $attributes;
    }

    public function addLine(array $line): self
    {
        if (!isset($line['transactionDate'])) {
            $line['transactionDate'] = (new \DateTime())->format('d-m-Y');
        }

        $this->attributes['supplierInvoiceLines'][] = $line;

        return $this;
    }

    /**
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
            $attributes['fiscalYear'],
            $attributes['invoiceDate'],
            $attributes['PeriodNumber'],
            $attributes['invoiceExpirationDate'],
            $attributes['journalId'],
            $attributes['paymentConditionId'],
            $attributes['PaymentReference'],
            $attributes['supplierId'],
            $attributes['vatAmount']
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

        if (!isset($this->PeriodNumber)) {
            $this->PeriodNumber = date('m');
        }

        if (!isset($this->invoiceDate)) {
            $this->invoiceDate = (new \DateTime())->format('d-m-Y');
        }

        if (!isset($this->invoiceExpirationDate)) {
            $this->invoiceExpirationDate = $this->invoiceDate;
        }

        return true;
    }
}
