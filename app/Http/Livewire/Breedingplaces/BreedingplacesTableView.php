<?php

namespace App\Http\Livewire\Breedingplaces;

use App\Http\Livewire\Breedingplaces\Actions\AddBreedingReportAction;
use App\Http\Livewire\Breedingplaces\Actions\EditBreedingplaceAction;
use App\Http\Livewire\Breedingplaces\Actions\OpenBreedingReportAction;
use App\Http\Livewire\Breedingplaces\Actions\RestoreBreedingplaceAction;
use App\Http\Livewire\Breedingplaces\Actions\SoftDeleteBreedingplaceAction;
use App\Models\Breeding;
use App\Models\Breedingplace;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use WireUi\Traits\Actions;

class BreedingplacesTableView extends TableView
{
    use Actions;

    /**
     * Sets a model class to get the initial data
     */
    public $breeding;

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
        if (! $this->breeding) {
            $this->breeding = request()->route('breeding.id');
        }

        if (request()->user()->can('viewAnyDeleted', Breeding::class)) {
            return Breedingplace::where('id_breeding', $this->breeding)->withTrashed();
        }

        return Breedingplace::where('id_breeding', $this->breeding);
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
                __('translations.attributes.patroness'),
                Header::title(__('breedingplaces.labels.animals'))->sortBy('animals'),
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
            Header::title(__('breedingplaces.labels.animals'))->sortBy('animals'),
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
        if (request()->user()->can('viewAnyDeleted', Breeding::class)) {
            return [
                $model->name,
                $model->users->name,
                $model->animals,
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
            $model->remarks,
            $model->added,
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function actionsByRow()
    {
        if (request()->user()->can('viewAnyDeleted', Breeding::class)) {
            return [
                new AddBreedingReportAction('breedingreport.create', __('translations.actions.addReport')),
                new OpenBreedingReportAction('breedingreport.index', __('translations.actions.openReport')),
                new EditBreedingplaceAction('breedingplaces.edit', __('translations.actions.edit')),
                new SoftDeleteBreedingplaceAction(),
                new RestoreBreedingplaceAction(),
            ];
        }

        return [
            new AddBreedingReportAction('breedingreport.create', __('translations.actions.addReport')),
            new OpenBreedingReportAction('breedingreport.index', __('translations.actions.openReport')),
            new EditBreedingplaceAction('breedingplaces.edit', __('translations.actions.edit')),
            new SoftDeleteBreedingplaceAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $breedingplace = Breedingplace::find($id);
        $breedingplace->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('breedingplaces.messages.successes.destroy', [
                'name' => $breedingplace->name,
            ])
        );
    }

    public function restore(int $id)
    {
        $breedingplace = Breedingplace::withTrashed()->find($id);
        $breedingplace->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('breedingplaces.messages.successes.restore', [
                'name' => $breedingplace->name,
            ])
        );
    }
}
