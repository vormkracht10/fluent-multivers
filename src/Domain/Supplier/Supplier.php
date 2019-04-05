<?php

namespace Vormkracht10\FluentMultivers\Domain\Supplier;

use Vormkracht10\FluentMultivers\Domain\Supplier\Queries\IndexQuery;

class Supplier
{
    public static function query(): IndexQuery
    {
        return new IndexQuery();
    }
}
