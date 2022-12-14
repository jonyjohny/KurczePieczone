<?php

namespace App\Http\Livewire\Incubationreport;

use App\Models\User;
use App\Models\Incubation;
use WireUi\Traits\Actions;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Models\Incubationincubator;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Incubationreport\Actions\EditIncubationreportAction;
use App\Http\Livewire\Incubationreport\Actions\RestoreIncubationreportAction;
use App\Http\Livewire\Incubationreport\Actions\SoftDeleteIncubationreportAction;
use App\Models\IncubationReport;

class IncubationreportTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    public $incubationincubator;

    public $searchBy = [
        'users.name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository()
    {   
        if (!$this->incubationincubator) {
            $this->incubationincubator = request()->route('incubationincubator.id');
        }

        if(request()->user()->can('viewAnyDeleted', Incubation::class )){
            return IncubationReport::where('incubationincubator_id', $this->incubationincubator)->withTrashed();
        }

        return IncubationReport::where('incubationincubator_id', $this->incubationincubator);
    }


    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        if(request()->user()->can('viewAnyDeleted', Incubation::class )){
            return [
                __('translations.attributes.patroness'),
                Header::title(__('translations.attributes.created_at'))->sortBy('created_at'),
                Header::title(__('translations.attributes.updated_at'))->sortBy('updated_at'),
                Header::title(__('translations.attributes.deleted_at'))->sortBy('deleted_at'),
            ];
        }
        return [
            __('translations.attributes.patroness'),
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
        if(request()->user()->can('viewAnyDeleted', Incubation::class )){
            return [
                $model->users->name,
                $model->created_at,
                $model->updated_at,
                $model->deleted_at,
            ];
        }
        return [
        ];
    }
    
    protected function actionsByRow()
    {
        if(request()->user()->can('viewAnyDeleted', Incubation::class )){
            return [
                new EditIncubationreportAction('incubationreport.edit', __('translations.actions.edit')),
                new SoftDeleteIncubationreportAction(),
                new RestoreIncubationreportAction(),
            ];        
        }
        return [
            new EditIncubationreportAction('incubationreport.edit', __('translations.actions.edit')),
            new SoftDeleteIncubationreportAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $incubationreport = IncubationReport::find($id);
        $incubationreport->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('incubationreport.messages.successes.destroy')
            );
    }

    public function restore(int $id)
    {
        $incubationreport = IncubationReport::withTrashed()->find($id);
        $incubationreport->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('incubationreport.messages.successes.restore')
        );
    }
}
