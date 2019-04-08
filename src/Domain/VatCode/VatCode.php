<?php

namespace Vormkracht10\FluentMultivers\Domain\VatCode;

use Vormkracht10\FluentMultivers\Domain\VatCode\Queries\IndexQuery;

class VatCode
{
    public static function query(): IndexQuery
    {
        return new IndexQuery();
    }
}
