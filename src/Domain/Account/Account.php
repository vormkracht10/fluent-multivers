<?php

namespace Vormkracht10\FluentMultivers\Domain\Account;

use Vormkracht10\FluentMultivers\Domain\Account\Queries\IndexQuery;

class Account
{
    public static function query(): IndexQuery
    {
        return new IndexQuery();
    }
}
