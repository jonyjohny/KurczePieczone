<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\Users\Actions\EditUserAction;
use App\Http\Livewire\Users\Actions\RestoreUserAction;
use App\Http\Livewire\Users\Actions\SoftDeleteUserAction;
use App\Http\Livewire\Users\Filters\EmailVerifiedFilter;
use App\Http\Livewire\Users\Filters\SoftDeleteFilter;
use App\Http\Livewire\Users\Filters\UsersRoleFilter;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class UsersTableView extends TableView
{
    use Actions;

    /**
     * Sets a model class to get the initial data
     */
    public $searchBy = [
        'name',
        'email',
        'roles.name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository(): Builder
    {
        if (request()->user()->can('viewAnyDeleted', User::class)) {
            return User::query()->withTrashed();
        }

        return User::query();
    }

    protected $paginate = 15;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        if (request()->user()->can('viewAnyDeleted', User::class)) {
            return [
                __('users.attributes.Avatar'),
                Header::title(__('users.attributes.name'))->sortBy('name'),
                Header::title(__('users.attributes.email'))->sortBy('email'),
                __('users.attributes.roles'),
                Header::title(__('translations.attributes.created_at'))->sortBy('created_at'),
                Header::title(__('translations.attributes.updated_at'))->sortBy('updated_at'),
                Header::title(__('translations.attributes.deleted_at'))->sortBy('deleted_at'),
            ];
        }

        return [
            __('users.attributes.Avatar'),
            Header::title(__('users.attributes.name'))->sortBy('name'),
            Header::title(__('users.attributes.email'))->sortBy('email'),
            __('users.attributes.roles'),
            Header::title(__('translations.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translations.attributes.updated_at'))->sortBy('updated_at'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        if (request()->user()->can('viewAnyDeleted', User::class)) {
            return [
                UI::avatar(asset($model->profile_photo_url)),
                $model->name,
                $model->email,
                $model->roles->implode('name', ', '),
                $model->created_at,
                $model->updated_at,
                $model->deleted_at,
            ];
        }

        return User::query();

        return [
            UI::avatar(asset($model->profile_photo_url)),
            $model->name,
            $model->email,
            $model->roles->implode('name', ', '),
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function filters()
    {
        if (request()->user()->can('viewAnyDeleted', User::class)) {
            return [
                new UsersRoleFilter,
                new EmailVerifiedFilter,
                new SoftDeleteFilter,
            ];
        }

        return User::query();

        return [
            new UsersRoleFilter,
            new EmailVerifiedFilter,
        ];
    }

    protected function actionsByRow()
    {
        if (request()->user()->can('viewAnyDeleted', User::class)) {
            return [
                new EditUserAction('users.edit', __('translations.actions.edit')),
                new SoftDeleteUserAction(),
                new RestoreUserAction(),
            ];
        }

        return User::query();

        return [
            new EditUserAction('users.edit', __('translations.actions.edit')),
        ];
    }

    public function softDelete(int $id)
    {
        $user = User::find($id);
        $user->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('users.messages.successes.destroy', [
                'name' => $user->name,
            ])
        );
    }

    public function restore(int $id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('users.messages.successes.restore', [
                'name' => $user->name,
            ])
        );
    }
}
