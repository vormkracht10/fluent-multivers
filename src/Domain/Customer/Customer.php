<?php

namespace Vormkracht10\FluentMultivers\Domain\Customer;

use Vormkracht10\FluentMultivers\Domain\Customer\Queries\IndexQuery;

class Customer
{
    public static function query(): IndexQuery
    {
        return new IndexQuery();
    }
}
