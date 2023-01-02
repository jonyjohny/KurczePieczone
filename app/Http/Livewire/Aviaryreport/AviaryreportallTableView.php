<?php

namespace App\Http\Livewire\Aviaryreport;

use App\Http\Livewire\Aviaryreport\Actions\EditAviaryreportAction;
use App\Http\Livewire\Aviaryreport\Actions\RestoreAviaryreportAction;
use App\Http\Livewire\Aviaryreport\Actions\SoftDeleteAviaryreportAction;
use App\Models\Aviary;
use App\Models\AviaryReport;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class AviaryreportallTableView extends TableView
{
    use Actions;

    /**
     * Sets a model class to get the initial data
     */
    public $aviary;

    public $searchBy = [
        'feeding',
        'cure',
        'hensExport',
        'roostersExport',
        'destination',
        'hensFalls',
        'roostersFalls',
        'remarksFalls',
        'remarks',
        'users.name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository()
    {
        if (! $this->aviary) {
            $this->aviary = request()->route('aviary.id');
        }

        if (request()->user()->can('viewAnyDeleted', Aviary::class)) {
            return AviaryReport::withTrashed()->wherehas('aviaryplace', function ($query) {
                $query->where('id_aviary', $this->aviary);
            });
        }

        return AviaryReport::wherehas('aviaryplace', function ($query) {
            $query->where('id_aviary', $this->aviary);
        });
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        if (request()->user()->can('viewAnyDeleted', Aviary::class)) {
            return [
                __('translations.attributes.Aviary'),
                Header::title(__('aviaryreport.attributes.feeding'))->sortBy('feeding'),
                Header::title(__('aviaryreport.attributes.cure'))->sortBy('cure'),
                Header::title(__('aviaryreport.attributes.hensExport'))->sortBy('hensExport'),
                Header::title(__('aviaryreport.attributes.roostersExport'))->sortBy('roostersExport'),
                Header::title(__('aviaryreport.attributes.destination'))->sortBy('destination'),
                Header::title(__('aviaryreport.attributes.hensFalls'))->sortBy('hensFalls'),
                Header::title(__('aviaryreport.attributes.roostersFalls'))->sortBy('roostersFalls'),
                Header::title(__('aviaryreport.attributes.remarksFalls'))->sortBy('remarksFalls'),
                Header::title(__('aviaryreport.attributes.remarks'))->sortBy('remarks'),
                __('translations.attributes.patroness'),
                Header::title(__('translations.attributes.created_at'))->sortBy('created_at'),
                Header::title(__('translations.attributes.updated_at'))->sortBy('updated_at'),
                Header::title(__('translations.attributes.deleted_at'))->sortBy('deleted_at'),
            ];
        }

        return [
            __('translations.attributes.Aviary'),
            Header::title(__('aviaryreport.attributes.feeding'))->sortBy('feeding'),
            Header::title(__('aviaryreport.attributes.cure'))->sortBy('cure'),
            Header::title(__('aviaryreport.attributes.hensExport'))->sortBy('hensExport'),
            Header::title(__('aviaryreport.attributes.roostersExport'))->sortBy('roostersExport'),
            Header::title(__('aviaryreport.attributes.destination'))->sortBy('destination'),
            Header::title(__('aviaryreport.attributes.hensFalls'))->sortBy('hensFalls'),
            Header::title(__('aviaryreport.attributes.roostersFalls'))->sortBy('roostersFalls'),
            Header::title(__('aviaryreport.attributes.remarksFalls'))->sortBy('remarksFalls'),
            Header::title(__('aviaryreport.attributes.remarks'))->sortBy('remarks'),
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
        if (request()->user()->can('viewAnyDeleted', Aviary::class)) {
            return [
                $model->aviaryplace->name,
                $model->feeding,
                $model->cure,
                $model->hensExport,
                $model->roostersExport,
                $model->destination,
                $model->hensFalls,
                $model->roostersFalls,
                $model->remarksFalls,
                $model->remarks,
                $model->users->name,
                $model->created_at,
                $model->updated_at,
                $model->deleted_at,
            ];
        }

        return [
            $model->aviaryplace->name,
            $model->feeding,
            $model->cure,
            $model->hensExport,
            $model->roostersExport,
            $model->destination,
            $model->hensFalls,
            $model->roostersFalls,
            $model->remarksFalls,
            $model->remarks,
            $model->users->name,
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function actionsByRow()
    {
        if (request()->user()->can('viewAnyDeleted', Aviary::class)) {
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
