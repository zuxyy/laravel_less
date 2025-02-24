<?php

namespace App\Http\Filters;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public function apply(Builder $builder);
}
