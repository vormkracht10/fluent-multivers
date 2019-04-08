<?php

namespace Vormkracht10\FluentMultivers\Domain\Order\Queries;

use Vormkracht10\FluentMultivers\Services\Builder;

class IndexQuery extends Builder
{
    public function openOrdersOrFail(): array
    {
        return $this->builder('OrderInfoList/OpenOrders')->get();
    }

    public function findOrFail(string $id): array
    {
        return $this->builder('Order/'.$id)->get();
    }

    public function byProjectOrFail(string $id): array
    {
        return $this->builder('OrderInfoList/ByProjectId/'.$id)->get();
    }

    public function byInvoiceOrFail(string $id): array
    {
        return $this->builder('OrderInfoList/OrdersForInvoice/'.$id)->get();
    }

    public function forCustomer(string $id): self
    {
        $this->builder('OrderInfoList/'.$id);

        return $this;
    }

    public function whereMinDate(string $date): self
    {
        $this->builder('?minDate='.$date);

        return $this;
    }

    public function whereMaxDate(string $date): self
    {
        $this->builder('?maxDate='.$date);

        return $this;
    }

    public function whereMinPrice(string $price): self
    {
        $this->builder('?minPrice='.$price);

        return $this;
    }

    public function whereMaxPrice(string $price): self
    {
        $this->builder('?maxPrice='.$price);

        return $this;
    }

    public function whereOpen(bool $status): self
    {
        $this->builder('?onlyOpen='.$status);

        return $this;
    }

    public function whereFiscalYear(int $year): self
    {
        $this->builder('?fiscalYear='.$year);

        return $this;
    }
}
