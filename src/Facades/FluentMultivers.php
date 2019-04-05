<?php

namespace Vormkracht10\FluentMultivers\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Routing\Redirector|Illuminate\Http\RedirectResponse auth()
 *
 * @see Vormkracht10\FluentMultivers\FluentMultivers
 */
class FluentMultivers extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'fluent-multivers';
    }
}
