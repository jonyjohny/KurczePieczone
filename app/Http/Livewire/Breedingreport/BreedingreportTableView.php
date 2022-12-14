<?php

namespace App\Http\Livewire\Breedingreport;

use App\Models\Breeding;

use WireUi\Traits\Actions;
use App\Models\Breedingplace;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Breedingreport\Actions\EditBreedingreportAction;
use App\Http\Livewire\Breedingreport\Actions\RestoreBreedingreportAction;
use App\Http\Livewire\Breedingreport\Actions\SoftDeleteBreedingreportAction;
use App\Models\BreedingReport;

class BreedingreportTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    public $breedingplace;

    public $searchBy = [
        'users.name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository()
    {   
        if (!$this->breedingplace) {
            $this->breedingplace = request()->route('breedingplace.id');
        }

        if(request()->user()->can('viewAnyDeleted', Breeding::class )){
            return BreedingReport::where('breedingplace_id', $this->breedingplace)->withTrashed();
        }

        return BreedingReport::where('breedingplace_id', $this->breedingplace);
    }


    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        if(request()->user()->can('viewAnyDeleted', Breeding::class )){
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
        if(request()->user()->can('viewAnyDeleted', Breeding::class )){
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
        if(request()->user()->can('viewAnyDeleted', Breeding::class )){
            return [
                new EditBreedingreportAction('breedingreport.edit', __('translations.actions.edit')),
                new SoftDeleteBreedingreportAction(),
                new RestoreBreedingreportAction(),
            ];        
        }
        return [
            new EditBreedingreportAction('breedingreport.edit', __('translations.actions.edit')),
            new SoftDeleteBreedingreportAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $breedingreport = BreedingReport::find($id);
        $breedingreport->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('breedingreport.messages.successes.destroy')
            );
    }

    public function restore(int $id)
    {
        $breedingreport = BreedingReport::withTrashed()->find($id);
        $breedingreport->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('breedingreport.messages.successes.restore')
        );
    }
}