<?php

namespace App\Http\Livewire\Incubationincubators;

use App\Http\Livewire\Incubationincubators\Actions\AddIncubationReportAction;
use App\Http\Livewire\Incubationincubators\Actions\EditIncubationincubatorAction;
use App\Http\Livewire\Incubationincubators\Actions\OpenIncubationReportAction;
use App\Http\Livewire\Incubationincubators\Actions\RestoreIncubationincubatorAction;
use App\Http\Livewire\Incubationincubators\Actions\SoftDeleteIncubationincubatorAction;
use App\Models\Incubation;
use App\Models\Incubationincubator;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class IncubationincubatorsTableView extends TableView
{
    use Actions;

    /**
     * Sets a model class to get the initial data
     */
    public $incubation;

    public $searchBy = [
        'name',
        'users.name',
        'remarks',
        'added',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository()
    {
        if (! $this->incubation) {
            $this->incubation = request()->route('incubation.id');
        }

        if (request()->user()->can('viewAnyDeleted', Incubation::class)) {
            return Incubationincubator::where('id_incubation', $this->incubation)->withTrashed();
        }

        return Incubationincubator::where('id_incubation', $this->incubation);
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
                __('translations.attributes.patroness'),
                Header::title(__('translations.attributes.remarks'))->sortBy('remarks'),
                Header::title(__('incubationincubators.labels.eggs'))->sortBy('eggs'),
                Header::title(__('translations.attributes.added'))->sortBy('added'),
                Header::title(__('translations.attributes.created_at'))->sortBy('created_at'),
                Header::title(__('translations.attributes.updated_at'))->sortBy('updated_at'),
                Header::title(__('translations.attributes.deleted_at'))->sortBy('deleted_at'),
            ];
        }

        return [
            Header::title(__('translations.attributes.name'))->sortBy('name'),
            __('translations.attributes.patroness'),
            Header::title(__('translations.attributes.remarks'))->sortBy('remarks'),
            Header::title(__('incubationincubators.labels.eggs'))->sortBy('eggs'),
            Header::title(__('translations.attributes.added'))->sortBy('added'),
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
                $model->users->name,
                $model->remarks,
                $model->eggs,
                $model->added,
                $model->created_at,
                $model->updated_at,
                $model->deleted_at,
            ];
        }

        return [
            $model->name,
            $model->users->name,
            $model->remarks,
            $model->eggs,
            $model->added,
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function actionsByRow()
    {
        if (request()->user()->can('viewAnyDeleted', Incubation::class)) {
            return [
                new AddIncubationReportAction('incubationreport.create', __('translations.actions.addReport')),
                new OpenIncubationReportAction('incubationreport.index', __('translations.actions.openReport')),
                new EditIncubationincubatorAction('incubationincubators.edit', __('translations.actions.edit')),
                new SoftDeleteIncubationincubatorAction(),
                new RestoreIncubationincubatorAction(),
            ];
        }

        return [
            new AddIncubationReportAction('incubationreport.create', __('translations.actions.addReport')),
            new OpenIncubationReportAction('incubationreport.index', __('translations.actions.openReport')),
            new EditIncubationincubatorAction('incubationincubators.edit', __('translations.actions.edit')),
            new SoftDeleteIncubationincubatorAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $incubationincubator = Incubationincubator::find($id);
        $incubationincubator->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('incubationincubators.messages.successes.destroy', [
                'name' => $incubationincubator->name,
            ])
        );
    }

    public function restore(int $id)
    {
        $incubationincubator = Incubationincubator::withTrashed()->find($id);
        $incubationincubator->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('incubationincubators.messages.successes.restore', [
                'name' => $incubationincubator->name,
            ])
        );
    }
}
