<?php

namespace App\Filters\Admin;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class UserSearchTermFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->where('name', 'like', '%'.$value.'%')
              ->orWhere('email', 'like', '%'.$value.'%');
    }
}
