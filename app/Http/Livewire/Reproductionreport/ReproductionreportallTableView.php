<?php

namespace App\Http\Livewire\Reproductionreport;

use WireUi\Traits\Actions;
use App\Models\Reproduction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Reproductionreport\Actions\EditReproductionreportAction;
use App\Http\Livewire\Reproductionreport\Actions\RestoreReproductionreportAction;
use App\Http\Livewire\Reproductionreport\Actions\SoftDeleteReproductionreportAction;
use App\Models\ReproductionReport;

class ReproductionreportallTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    public $reproduction;

    public $searchBy = [
        'nicHens',
        'nicRoosters',
        'cannibalismHens',
        'cannibalismRoosters',
        'debilityHens',
        'debilityRoosters',
        'otherHens',
        'otherRoosters',
        'fallsRemarks',
        'goodEggs',
        'badEggs',
        'exportEggs',
        'prevention',
        'remarks',
        'users.name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository()
    {   
        if (!$this->reproduction) {
            $this->reproduction = request()->route('reproduction.id');
        }

        if(request()->user()->can('viewAnyDeleted', Reproduction::class )){
            return ReproductionReport::withTrashed()->wherehas('reproductionrow', function ($query) {
                $query->where("id_reproduction", $this->reproduction);
            });
        }

        return ReproductionReport::wherehas('reproductionrow', function ($query) {
            $query->where("id_reproduction", $this->reproduction);
        });
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
                __('translations.attributes.Row'),
                Header::title(__('reproductionreport.attributes.nicHens'))->sortBy('nicHens'),
                Header::title(__('reproductionreport.attributes.nicRoosters'))->sortBy('nicRoosters'),
                Header::title(__('reproductionreport.attributes.cannibalismHens'))->sortBy('cannibalismHens'),
                Header::title(__('reproductionreport.attributes.cannibalismRoosters'))->sortBy('cannibalismRoosters'),
                Header::title(__('reproductionreport.attributes.debilityHens'))->sortBy('debilityHens'),
                Header::title(__('reproductionreport.attributes.debilityRoosters'))->sortBy('debilityRoosters'),
                Header::title(__('reproductionreport.attributes.otherHens'))->sortBy('otherHens'),
                Header::title(__('reproductionreport.attributes.otherRoosters'))->sortBy('otherRoosters'),
                Header::title(__('reproductionreport.attributes.fallsRemarks'))->sortBy('fallsRemarks'),
                Header::title(__('reproductionreport.attributes.goodEggs'))->sortBy('goodEggs'),
                Header::title(__('reproductionreport.attributes.badEggs'))->sortBy('badEggs'),
                Header::title(__('reproductionreport.attributes.exportEggs'))->sortBy('exportEggs'),
                Header::title(__('reproductionreport.attributes.prevention'))->sortBy('prevention'),
                Header::title(__('reproductionreport.attributes.remarks'))->sortBy('remarks'),
                __('translations.attributes.patroness'),
                Header::title(__('translations.attributes.created_at'))->sortBy('created_at'),
                Header::title(__('translations.attributes.updated_at'))->sortBy('updated_at'),
                Header::title(__('translations.attributes.deleted_at'))->sortBy('deleted_at'),
            ];
        }
        return [
            __('translations.attributes.Row'),
            Header::title(__('reproductionreport.attributes.nicHens'))->sortBy('nicHens'),
            Header::title(__('reproductionreport.attributes.nicRoosters'))->sortBy('nicRoosters'),
            Header::title(__('reproductionreport.attributes.cannibalismHens'))->sortBy('cannibalismHens'),
            Header::title(__('reproductionreport.attributes.cannibalismRoosters'))->sortBy('cannibalismRoosters'),
            Header::title(__('reproductionreport.attributes.debilityHens'))->sortBy('debilityHens'),
            Header::title(__('reproductionreport.attributes.debilityRoosters'))->sortBy('debilityRoosters'),
            Header::title(__('reproductionreport.attributes.otherHens'))->sortBy('otherHens'),
            Header::title(__('reproductionreport.attributes.otherRoosters'))->sortBy('otherRoosters'),
            Header::title(__('reproductionreport.attributes.fallsRemarks'))->sortBy('fallsRemarks'),
            Header::title(__('reproductionreport.attributes.goodEggs'))->sortBy('goodEggs'),
            Header::title(__('reproductionreport.attributes.badEggs'))->sortBy('badEggs'),
            Header::title(__('reproductionreport.attributes.exportEggs'))->sortBy('exportEggs'),
            Header::title(__('reproductionreport.attributes.prevention'))->sortBy('prevention'),
            Header::title(__('reproductionreport.attributes.remarks'))->sortBy('remarks'),
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
                $model->reproductionrow->name,
                $model->nicHens,
                $model->nicRoosters,
                $model->cannibalismHens,
                $model->cannibalismRoosters,
                $model->debilityHens,
                $model->debilityRoosters,
                $model->otherHens,
                $model->otherRoosters,
                $model->fallsRemarks,
                $model->goodEggs,
                $model->badEggs,
                $model->exportEggs,
                $model->prevention,
                $model->remarks,
                $model->users->name,
                $model->created_at,
                $model->updated_at,
                $model->deleted_at,
            ];
        }
        return [
            $model->reproductionrow->name,
            $model->nicHens,
            $model->nicRoosters,
            $model->cannibalismHens,
            $model->cannibalismRoosters,
            $model->debilityHens,
            $model->debilityRoosters,
            $model->otherHens,
            $model->otherRoosters,
            $model->fallsRemarks,
            $model->goodEggs,
            $model->badEggs,
            $model->exportEggs,
            $model->prevention,
            $model->remarks,
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
