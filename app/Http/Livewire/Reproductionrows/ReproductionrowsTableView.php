<?php

namespace App\Http\Livewire\Reproductionrows;

use WireUi\Traits\Actions;
use App\Models\Reproductionrow;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Reproductionrows\Actions\EditReproductionrowAction;
use App\Http\Livewire\Reproductionrows\Actions\RestoreReproductionrowAction;
use App\Http\Livewire\Reproductionrows\Actions\SoftDeleteReproductionrowAction;

class ReproductionrowsTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    public $reproduction;

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
        if (!$this->reproduction) {
            $this->reproduction = request()->route('reproduction.id');
        }

        if(request()->user()->can('viewAnyDeleted', Reproduction::class )){
            return Reproductionrow::where('id_reproduction', $this->reproduction)->withTrashed();
        }

        return Reproductionrow::where('id_reproduction', $this->reproduction);
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
                Header::title(__('translations.attributes.name'))->sortBy('name'),
                __('translations.attributes.patroness'),
                Header::title(__('reproductionrows.labels.hens'))->sortBy('hens'),
                Header::title(__('reproductionrows.labels.roosters'))->sortBy('roosters'),
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
            Header::title(__('reproductionrows.labels.hens'))->sortBy('hens'),
            Header::title(__('reproductionrows.labels.roosters'))->sortBy('roosters'),
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
        if(request()->user()->can('viewAnyDeleted', Reproduction::class )){
            return [
                $model->name,
                $model->users->name,
                $model->hens,
                $model->roosters,
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
            $model->hens,
            $model->roosters,
            $model->remarks,
            $model->added,
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function actionsByRow()
    {
        if(request()->user()->can('viewAnyDeleted', Reproduction::class )){
            return [
                new EditReproductionrowAction('reproductionrows.edit', __('translations.actions.edit')),
                new SoftDeleteReproductionrowAction(),
                new RestoreReproductionrowAction(),
            ];        
        }
        return [
            new EditReproductionrowAction('reproductionrows.edit', __('translations.actions.edit')),
            new SoftDeleteReproductionrowAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $reproductionrow = Reproductionrow::find($id);
        $reproductionrow->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('reproductionrows.messages.successes.destroy', [
                'name' => $reproductionrow->name
            ])
            );
    }

    public function restore(int $id)
    {
        $reproductionrow = Reproductionrow::withTrashed()->find($id);
        $reproductionrow->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('reproductionrows.messages.successes.restore', [
                'name' => $reproductionrow->name
            ])
        );
    }
}
