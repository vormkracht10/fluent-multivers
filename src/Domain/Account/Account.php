<?php

namespace Vormkracht10\FluentMultivers\Domain\Account;

use Vormkracht10\FluentMultivers\Domain\Account\Queries\IndexQuery;
use Vormkracht10\FluentMultivers\Domain\Account\Queries\CreateQuery;

class Account
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
