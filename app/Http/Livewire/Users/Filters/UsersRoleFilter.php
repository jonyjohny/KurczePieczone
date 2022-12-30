<?php

namespace App\Http\Livewire\Users\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;
use Spatie\Permission\Models\Role;

class UsersRoleFilter extends Filter
{
    public $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('users.attributes.roles');
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->whereHas('roles', function (Builder $query) use ($value) {
            $query->where('id', '=', $value);
        });
    }

    public function options(): array
    {
        $roles = Role::all();
        $labels = $roles->pluck('name');
        $values = $roles->pluck('id');

        return $labels->combine($values)->toArray();
    }
}
