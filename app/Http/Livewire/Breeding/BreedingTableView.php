<?php

namespace App\Http\Livewire\Breeding;

use App\Models\Breeding;
use WireUi\Traits\Actions;
use LaravelViews\Facades\UI;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Breeding\Filters\activeFilter;
use App\Http\Livewire\Breeding\Filters\SoftDeleteFilter;
use App\Http\Livewire\Breeding\Actions\EditBreedingAction;
use App\Http\Livewire\Breeding\Actions\OpenBreedingAction;
use App\Http\Livewire\Breeding\Actions\RestoreBreedingAction;
use App\Http\Livewire\Breeding\Actions\SoftDeleteBreedingAction;

class BreedingTableView extends TableView
{
    use Actions;

    /**
     * Sets a model class to get the initial data
     */
    public $searchBy = [
        'name',
        'remarks',
        'closed',
        'archived',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository(): Builder
    {
        if (request()->user()->can('viewAnyDeleted', Breeding::class)) {
            return Breeding::query()->withTrashed();
        }

        return Breeding::query();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        if (request()->user()->can('viewAnyDeleted', Breeding::class)) {
            return [
                Header::title(__('translations.attributes.name'))->sortBy('name'),
                Header::title(__('translations.attributes.remarks'))->sortBy('remarks'),
                Header::title(__('translations.attributes.closed'))->sortBy('closed'),
                Header::title(__('translations.attributes.archived'))->sortBy('archived'),
                Header::title(__('translations.attributes.created_at'))->sortBy('created_at'),
                Header::title(__('translations.attributes.updated_at'))->sortBy('updated_at'),
                Header::title(__('translations.attributes.deleted_at'))->sortBy('deleted_at'),
            ];
        }

        return [
            Header::title(__('translations.attributes.name'))->sortBy('name'),
            Header::title(__('translations.attributes.remarks'))->sortBy('remarks'),
            Header::title(__('translations.attributes.closed'))->sortBy('closed'),
            Header::title(__('translations.attributes.archived'))->sortBy('archived'),
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
        if (request()->user()->can('viewAnyDeleted', Breeding::class)) {
            return [
                $model->name,
                $model->remarks,
                $model->closed ? UI::icon('check', 'success') : UI::icon('x', 'danger'),
                $model->archived ? UI::icon('check', 'success') : UI::icon('x', 'danger'),
                $model->created_at,
                $model->updated_at,
                $model->deleted_at,
            ];
        }

        return [
            $model->name,
            $model->remarks,
            $model->closed ? UI::icon('check', 'success') : UI::icon('x', 'danger'),
            $model->archived ? UI::icon('check', 'success') : UI::icon('x', 'danger'),
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function filters()
    {
        if (request()->user()->can('viewAnyDeleted', Breeding::class)) {
            return [
                new activeFilter,
                new SoftDeleteFilter,
            ];
        }

        return [
            new activeFilter,
        ];
    }

    protected function actionsByRow()
    {
        if (request()->user()->can('viewAnyDeleted', Breeding::class)) {
            return [
                new OpenBreedingAction('breedingplaces.index', __('translations.actions.open')),
                new EditBreedingAction('breeding.edit', __('translations.actions.edit')),
                new SoftDeleteBreedingAction(),
                new RestoreBreedingAction(),
            ];
        }

        return [
            new OpenBreedingAction('breedingplaces.index', __('translations.actions.open')),
            new EditBreedingAction('breeding.edit', __('translations.actions.edit')),
        ];
    }

    public function softDelete(int $id)
    {
        $breeding = Breeding::find($id);
        $breeding->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('breeding.messages.successes.destroy', [
                'name' => $breeding->name,
            ])
        );
    }

    public function restore(int $id)
    {
        $breeding = Breeding::withTrashed()->find($id);
        $breeding->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('breeding.messages.successes.restore', [
                'name' => $breeding->name,
            ])
        );
    }
}
