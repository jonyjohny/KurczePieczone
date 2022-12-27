<?php

namespace App\Http\Livewire\Reproductionrowcages;

use WireUi\Traits\Actions;
use App\Models\Reproduction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Models\Reproductionrowcages;
use App\Http\Livewire\Reproductionrowcages\Actions\AddReproductionReportAction;
use App\Http\Livewire\Reproductionrowcages\Actions\OpenReproductionReportAction;
use App\Http\Livewire\Reproductionrowcages\Actions\EditReproductionrowcagesAction;
use App\Http\Livewire\Reproductionrowcages\Actions\RestoreReproductionrowcagesAction;
use App\Http\Livewire\Reproductionrowcages\Actions\SoftDeleteReproductionrowcagesAction;

class ReproductionrowcagesTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    public $reproductionrow;

    public $searchBy = [
        'number',
        'remarks',
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
            return Reproductionrowcages::where('reproductionrow_id', $this->reproductionrow)->withTrashed();
        }

        return Reproductionrowcages::where('reproductionrow_id', $this->reproductionrow);
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
                Header::title(__('reproductionrowcages.attributes.number'))->sortBy('number'),
                Header::title(__('reproductionrowcages.attributes.remarks'))->sortBy('remarks'),
                Header::title(__('translations.attributes.created_at'))->sortBy('created_at'),
                Header::title(__('translations.attributes.updated_at'))->sortBy('updated_at'),
                Header::title(__('translations.attributes.deleted_at'))->sortBy('deleted_at'),
            ];
        }
        return [
            Header::title(__('reproductionrowcages.attributes.number'))->sortBy('number'),
            Header::title(__('reproductionrowcages.attributes.remarks'))->sortBy('remarks'),
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
                $model->number,
                $model->remarks,
                $model->created_at,
                $model->updated_at,
                $model->deleted_at,
            ];
        }
        return [
            $model->number,
            $model->remarks,
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function actionsByRow()
    {
        if(request()->user()->can('viewAnyDeleted', Reproduction::class )){
            return [
                new AddReproductionReportAction('reproductionreport.create',__('translations.actions.addReport')),
                new OpenReproductionReportAction('reproductionreport.index',__('translations.actions.openReport')),
                new EditReproductionrowcagesAction('reproductionrowcages.edit', __('translations.actions.edit')),
                new SoftDeleteReproductionrowcagesAction(),
                new RestoreReproductionrowcagesAction(),
            ];        
        }
        return [
            new AddReproductionReportAction('reproductionreport.create',__('translations.actions.addReport')),
            new OpenReproductionReportAction('reproductionreport.index',__('translations.actions.openReport')),
            new EditReproductionrowcagesAction('reproductionrowcages.edit', __('translations.actions.edit')),
            new SoftDeleteReproductionrowcagesAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $reproductionrowcage = Reproductionrowcages::find($id);
        $reproductionrowcage->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('reproductionrowcages.messages.successes.destroy')
            );
    }

    public function restore(int $id)
    {
        $reproductionrowcage = Reproductionrowcages::withTrashed()->find($id);
        $reproductionrowcage->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('reproductionrowcages.messages.successes.restore')
        );
    }
}
