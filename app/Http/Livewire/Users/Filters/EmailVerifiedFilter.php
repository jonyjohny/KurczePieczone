<?php

namespace App\Http\Livewire\Users\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class EmailVerifiedFilter extends Filter
{
    public $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('users.attributes.email_verified_at');
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        if ($value == 1) {
            return $query->whereNotNull('email_verified_at');
        }

        return $query->whereNull('email_verified_at');
    }

    public function options(): array
    {
        return[
            __('translations.yes') => 1,
            __('translations.no') => 0,
        ];
    }
}
