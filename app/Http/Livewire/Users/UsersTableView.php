<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use WireUi\Traits\Actions;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Users\Actions\EditUserAction;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Users\Filters\UsersRoleFilter;
use App\Http\Livewire\Users\Filters\SoftDeleteFilter;
use App\Http\Livewire\Users\Actions\RestoreUserAction;
use App\Http\Livewire\Users\Filters\EmailVerifiedFilter;
use App\Http\Livewire\Users\Actions\SoftDeleteUserAction;

class UsersTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;

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
        return User::query()->withTrashed();
    }

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
            Header::title(__('translations.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translations.attributes.deleted_at'))->sortBy('deleted_at'),
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
            $model->roles->implode('name', ', '),
            $model->created_at,
            $model->updated_at,
            $model->deleted_at,
        ];
    }

    protected function filters()
    {
        return [
            new UsersRoleFilter,
            new EmailVerifiedFilter,
            new SoftDeleteFilter,
        ];
    }

    protected function actionsByRow()
    {
        return [
            new EditUserAction('users.edit', __('translations.actions.edit')),
            new SoftDeleteUserAction(),
            new RestoreUserAction()
        ];
    }

    public function softDelete(int $id)
    {
        $user = User::find($id);
        $user->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('users.messages.successes.destroy', [
                'name' => $user->name
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
                'name' => $user->name
            ])
        );
    }
}
