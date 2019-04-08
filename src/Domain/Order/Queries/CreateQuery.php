<?php

namespace Vormkracht10\FluentMultivers\Domain\Order\Queries;

use Vormkracht10\FluentMultivers\Services\Builder;
use Vormkracht10\FluentMultivers\Services\Attributes;

class CreateQuery extends Builder
{
    use Attributes;

    public function __construct(array $attributes)
    {
        $this->builder('Order');
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

    public function addLine(array $line): self
    {
        if (!isset($line['deliveryDate'])) {
            $line['deliveryDate'] = (new \DateTime())->format('d-m-Y');
        }

        $this->attributes['orderLines'][] = $line;

        return $this;
    }

    public function validate(array $attributes): bool
    {
        $conditionA = isset(
            $attributes['customerId'],
            $attributes['orderDate'],
            $attributes['paymentConditionId'],
            $attributes['orderLines']
        );

        $conditionB = true;

        foreach ($attributes['orderLines'] as $line) {
            if (!isset($line['accountId'], $line['description'], $line['productId'], $line['quantityOrdered'])) {
                $conditionB = false;
            }
        }

        return $conditionA === true && $conditionB === true;
    }

    protected function validAndFixed(): bool
    {
        if ($this->validate($this->attributes)) {
            return true;
        }

        if (!isset($this->orderDate)) {
            $this->orderDate = (new \DateTime())->format('d-m-Y');
        }

        return true;
    }
}
