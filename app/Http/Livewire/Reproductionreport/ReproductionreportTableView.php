<?php

namespace App\Http\Livewire\Reproductionreport;

use WireUi\Traits\Actions;
use App\Models\Reproduction;
use App\Models\Reproductionrow;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Reproductionreport\Actions\EditReproductionreportAction;
use App\Http\Livewire\Reproductionreport\Actions\RestoreReproductionreportAction;
use App\Http\Livewire\Reproductionreport\Actions\SoftDeleteReproductionreportAction;
use App\Models\ReproductionReport;

class ReproductionreportTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    public $reproductionrow;

    public $searchBy = [
        'users.name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository()
    {   
        if (!$this->reproductionrow) {
            $this->reproductionrow = request()->route('reproductionrow.id');
        }

        if(request()->user()->can('viewAnyDeleted', Reproduction::class )){
            return ReproductionReport::where('reproductionrow_id', $this->reproductionrow)->withTrashed();
        }

        return ReproductionReport::where('reproductionrow_id', $this->reproductionrow);
    }


    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        if(request()->user()->can('viewAnyDeleted', Reproduction::class )){
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
        if(request()->user()->can('viewAnyDeleted', Reproduction::class )){
            return [
                $model->users->name,
                $model->created_at,
                $model->updated_at,
                $model->deleted_at,
            ];
        }
        return [
            $model->users->name,
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function actionsByRow()
    {
        if(request()->user()->can('viewAnyDeleted', Reproduction::class )){
            return [
                new EditReproductionreportAction('reproductionreport.edit', __('translations.actions.edit')),
                new SoftDeleteReproductionreportAction(),
                new RestoreReproductionreportAction(),
            ];        
        }
        return [
            new EditReproductionreportAction('reproductionreport.edit', __('translations.actions.edit')),
            new SoftDeleteReproductionreportAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $reproductionreport = ReproductionReport::find($id);
        $reproductionreport->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('reproductionreport.messages.successes.destroy')
            );
    }

    public function restore(int $id)
    {
        $reproductionreport = ReproductionReport::withTrashed()->find($id);
        $reproductionreport->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('reproductionreport.messages.successes.restore')
        );
    }
}
