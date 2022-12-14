<?php

namespace App\Http\Livewire\Incubations\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class SoftDeleteFilter extends Filter
{
    public $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('translations.attributes.softdeletefiltr');
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        if ($value == 1) {
            return $query->whereNotNull('deleted_at');
        }

        return$query->whereNull('deleted_at');
    }

    public function options(): array
    {
        return[
            __('translations.yes') => 1,
            __('translations.no') => 0,
        ];
    }
}
