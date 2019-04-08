<?php

namespace Vormkracht10\FluentMultivers\Domain\Order;

use Vormkracht10\FluentMultivers\Domain\Order\Queries\IndexQuery;
use Vormkracht10\FluentMultivers\Domain\Order\Queries\CreateQuery;

class Order
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
