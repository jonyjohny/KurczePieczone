<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Users\Filters\UsersRoleFilter;
use App\Http\Livewire\Users\Filters\EmailVerifiedFilter;

class UsersTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;

    public $searchBy = [
        'name',
        'email',
        'roles.name',
        'created_at',
    ];

    protected $paginate = 15;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('users.attributes.name'))->sortBy('name'),
            Header::title(__('users.attributes.email'))->sortBy('email'),
            __('users.attributes.roles'),
            Header::title(__('translations.attributes.created_at'))->sortBy('created_at'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->name,
            $model->email,
            $model->roles->implode('name', ','),
            $model->created_at,
        ];
    }

    protected function filters()
    {
        return [
            new UsersRoleFilter,
            new EmailVerifiedFilter,
        ];
    }
}
