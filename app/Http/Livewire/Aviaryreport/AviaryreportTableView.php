<?php

namespace App\Http\Livewire\Aviaryreport;

use App\Models\Aviary;
use WireUi\Traits\Actions;
use App\Models\Aviaryplace;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Aviaryreport\Actions\EditAviaryreportAction;
use App\Http\Livewire\Aviaryreport\Actions\RestoreAviaryreportAction;
use App\Http\Livewire\Aviaryreport\Actions\SoftDeleteAviaryreportAction;
use App\Models\AviaryReport;

class AviaryreportTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    public $aviaryplace;

    public $searchBy = [
        'users.name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository()
    {   
        if (!$this->aviaryplace) {
            $this->aviaryplace = request()->route('aviaryplace.id');
        }

        if(request()->user()->can('viewAnyDeleted', Aviary::class )){
            return AviaryReport::where('aviaryplace_id', $this->aviaryplace)->withTrashed();
        }

        return AviaryReport::where('aviaryplace_id', $this->aviaryplace);
    }


    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        if(request()->user()->can('viewAnyDeleted', Aviary::class )){
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
        if(request()->user()->can('viewAnyDeleted', Aviary::class )){
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
        if(request()->user()->can('viewAnyDeleted', Aviary::class )){
            return [
                new EditAviaryreportAction('aviaryreport.edit', __('translations.actions.edit')),
                new SoftDeleteAviaryreportAction(),
                new RestoreAviaryreportAction(),
            ];        
        }
        return [
            new EditAviaryreportAction('aviaryreport.edit', __('translations.actions.edit')),
            new SoftDeleteAviaryreportAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $aviaryreport = AviaryReport::find($id);
        $aviaryreport->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('aviaryreport.messages.successes.destroy')
            );
    }

    public function restore(int $id)
    {
        $aviaryreport = AviaryReport::withTrashed()->find($id);
        $aviaryreport->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('aviaryreport.messages.successes.restore')
        );
    }
}