<?php

namespace Vormkracht10\FluentMultivers\Domain\Customer;

use Vormkracht10\FluentMultivers\Domain\Customer\Queries\IndexQuery;
use Vormkracht10\FluentMultivers\Domain\Customer\Queries\CreateQuery;

class Customer
{
    public static function query(): IndexQuery
    {
        return new IndexQuery();
    }

    public static function create(array $attributes): array
    {
        return self::new($attributes)->save();
    }

    public static function new(array $attributes = []): CreateQuery
    {
        return new CreateQuery($attributes);
    }
}
