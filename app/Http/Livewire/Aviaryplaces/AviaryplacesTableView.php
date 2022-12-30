<?php

namespace App\Http\Livewire\Aviaryplaces;

use App\Http\Livewire\Aviaryplaces\Actions\AddAviarypReportAction;
use App\Http\Livewire\Aviaryplaces\Actions\EditAviaryplaceAction;
use App\Http\Livewire\Aviaryplaces\Actions\OpenAviaryReportAction;
use App\Http\Livewire\Aviaryplaces\Actions\RestoreAviaryplaceAction;
use App\Http\Livewire\Aviaryplaces\Actions\SoftDeleteAviaryplaceAction;
use App\Models\Aviary;
use App\Models\Aviaryplace;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class AviaryplacesTableView extends TableView
{
    use Actions;

    /**
     * Sets a model class to get the initial data
     */
    public $aviary;

    public $searchBy = [
        'name',
        'users.name',
        'age',
        'remarks',
        'added',
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
            return Aviaryplace::where('id_aviary', $this->aviary)->withTrashed();
        }

        return Aviaryplace::where('id_aviary', $this->aviary);
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
                Header::title(__('translations.attributes.name'))->sortBy('name'),
                __('translations.attributes.patroness'),
                Header::title(__('aviaryplaces.labels.animals'))->sortBy('animals'),
                Header::title(__('aviaryplaces.labels.hens'))->sortBy('hens'),
                Header::title(__('aviaryplaces.labels.roosters'))->sortBy('roosters'),
                Header::title(__('aviaryplaces.labels.age'))->sortBy('age'),
                Header::title(__('translations.attributes.remarks'))->sortBy('remarks'),
                Header::title(__('translations.attributes.added'))->sortBy('added'),
                Header::title(__('translations.attributes.created_at'))->sortBy('created_at'),
                Header::title(__('translations.attributes.updated_at'))->sortBy('updated_at'),
                Header::title(__('translations.attributes.deleted_at'))->sortBy('deleted_at'),
            ];
        }

        return [
            Header::title(__('translations.attributes.name'))->sortBy('name'),
            __('translations.attributes.patroness'),
            Header::title(__('aviaryplaces.labels.animals'))->sortBy('animals'),
            Header::title(__('aviaryplaces.labels.hens'))->sortBy('hens'),
            Header::title(__('aviaryplaces.labels.roosters'))->sortBy('roosters'),
            Header::title(__('aviaryplaces.labels.age'))->sortBy('age'),
            Header::title(__('translations.attributes.remarks'))->sortBy('remarks'),
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
        if (request()->user()->can('viewAnyDeleted', Aviary::class)) {
            return [
                $model->name,
                $model->users->name,
                $model->animals,
                $model->hens,
                $model->roosters,
                $model->age,
                $model->remarks,
                $model->added,
                $model->created_at,
                $model->updated_at,
                $model->deleted_at,
            ];
        }

        return [
            $model->name,
            $model->users->name,
            $model->animals,
            $model->hens,
            $model->roosters,
            $model->age,
            $model->remarks,
            $model->added,
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function actionsByRow()
    {
        if (request()->user()->can('viewAnyDeleted', Aviary::class)) {
            return [
                new AddAviarypReportAction('aviaryreport.create', __('translations.actions.addReport')),
                new OpenAviaryReportAction('aviaryreport.index', __('translations.actions.openReport')),
                new EditAviaryplaceAction('aviaryplaces.edit', __('translations.actions.edit')),
                new SoftDeleteAviaryplaceAction(),
                new RestoreAviaryplaceAction(),
            ];
        }

        return [
            new AddAviarypReportAction('aviaryreport.create', __('translations.actions.addReport')),
            new OpenAviaryReportAction('aviaryreport.index', __('translations.actions.openReport')),
            new EditAviaryplaceAction('aviaryplaces.edit', __('translations.actions.edit')),
            new SoftDeleteAviaryplaceAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $aviaryplace = Aviaryplace::find($id);
        $aviaryplace->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('aviaryplaces.messages.successes.destroy', [
                'name' => $aviaryplace->name,
            ])
        );
    }

    public function restore(int $id)
    {
        $aviaryplace = Aviaryplace::withTrashed()->find($id);
        $aviaryplace->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('aviaryplaces.messages.successes.restore', [
                'name' => $aviaryplace->name,
            ])
        );
    }
}
