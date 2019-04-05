<?php

namespace Vormkracht10\FluentMultivers;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class FluentMultivers
{
    /**
     * Redirect to the auth portal of Multivers.
     *
     * @return Redirector|RedirectResponse
     */
    public function auth()
    {
        $url = config('fluent-multivers.url.api')
               .'OAuth/Authorize?client_id='.config('fluent-multivers.client_id')
               .'&redirect_uri='.config('fluent-multivers.url.return')
               .'&scope=http://UNIT4.Multivers.API/Web/WebApi/*&response_type=token';

        return redirect($url);
    }
}
