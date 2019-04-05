<?php

namespace Vormkracht10\FluentMultivers\Domain\Supplier;

use Vormkracht10\FluentMultivers\Domain\Supplier\Queries\Invoice\IndexQuery;
use Vormkracht10\FluentMultivers\Domain\Supplier\Queries\Invoice\CreateQuery;

class Invoice
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
