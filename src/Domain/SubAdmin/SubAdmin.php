<?php

namespace Vormkracht10\FluentMultivers\Domain\SubAdmin;

use Vormkracht10\FluentMultivers\Domain\SubAdmin\Queries\IndexQuery;

class SubAdmin
{
    public static function query(): IndexQuery
    {
        return new IndexQuery();
    }
}
