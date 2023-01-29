<?php

namespace App\Http\Livewire\Reproductions\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class ActiveFilter extends Filter
{
    public $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('translations.attributes.active');
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        if ($value == 0) {
            return $query->where('closed', '0')->where('archived', '0');
        } elseif ($value == 1) {
            return $query->where('closed', '1');
        }

        return $query->where('archived', '1');
    }

    public function options(): array
    {
        return[
            __('translations.attributes.active') => 0,
            __('translations.attributes.closed') => 1,
            __('translations.attributes.archived') => 2,
        ];
    }
}
