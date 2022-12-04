<?php

namespace App\Http\Livewire\Incubations;

use App\Models\Incubation;
use WireUi\Traits\Actions;
use LaravelViews\Facades\UI;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Incubations\Filters\SoftDeleteFilter;
use App\Http\Livewire\Incubations\Actions\EditIncubationAction;
use App\Http\Livewire\Incubations\Actions\OpenIncubationAction;
use App\Http\Livewire\Incubations\Actions\RestoreIncubationAction;
use App\Http\Livewire\Incubations\Actions\SoftDeleteIncubationAction;

class IncubationsTableView extends TableView
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
        if (request()->user()->can('viewAnyDeleted', Incubation::class)) {
            return Incubation::query()->withTrashed();
        }
        return Incubation::query();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        if (request()->user()->can('viewAnyDeleted', Incubation::class)) {
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
        if (request()->user()->can('viewAnyDeleted', Incubation::class)) {
            return [
                $model->name,
                $model->remarks,
                $model->closed ? UI::icon('check', 'success') : UI::icon('x', 'danger'),
                $model->archived? UI::icon('check', 'success') : UI::icon('x', 'danger'),
                $model->created_at,
                $model->updated_at,
                $model->deleted_at,
            ];
        }
        return [
            $model->name,
            $model->remarks,
            $model->closed ? UI::icon('check', 'success') : UI::icon('x', 'danger'),
            $model->archived? UI::icon('check', 'success') : UI::icon('x', 'danger'),
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function filters()
    {
        if (request()->user()->can('viewAnyDeleted', Incubation::class)) {
            return [
                new SoftDeleteFilter,
            ];
        }
        return [
            //
        ];
    }

    protected function actionsByRow()
    {
        if (request()->user()->can('viewAnyDeleted', Incubation::class)) {
            return [
                new OpenIncubationAction('incubationincubators.index',__('translations.actions.open')),
                new EditIncubationAction('incubations.edit', __('translations.actions.edit')),
                new SoftDeleteIncubationAction(),
                new RestoreIncubationAction()
            ];
        }
        return [
            new EditIncubationAction('incubations.edit', __('translations.actions.edit')),
        ];
    }

    public function softDelete(int $id)
    {
        $incubation = Incubation::find($id);
        $incubation->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('incubations.messages.successes.destroy', [
                'name' => $incubation->name
            ])
        );
    }

    public function restore(int $id)
    {
        $incubation = Incubation::withTrashed()->find($id);
        $incubation->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('incubations.messages.successes.restore', [
                'name' => $incubation->name
            ])
        );
    }
}
