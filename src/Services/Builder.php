<?php

namespace Vormkracht10\FluentMultivers\Services;

use Laveto\LaravelMultivers\Facades\Multivers;

class Builder
{
    /** @var string */
    protected $query = '';

    /** @var array */
    protected $attributes = [];

    public function builder(string $query): self
    {
        $this->query .= $query;

        return $this;
    }

    public function get(): array
    {
        return Multivers::get($this->query);
    }

    public function post(): array
    {
        return Multivers::post($this->query, $this->attributes);
    }
}
