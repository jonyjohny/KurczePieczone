<?php

namespace App\Http\Livewire\Reproductions;

use WireUi\Traits\Actions;
use App\Models\Reproduction;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Users\Filters\SoftDeleteFilter;
use App\Http\Livewire\Reproductions\Actions\EditReproductionAction;
use App\Http\Livewire\Reproductions\Actions\RestoreReproductionAction;
use App\Http\Livewire\Reproductions\Actions\SoftDeleteReproductionAction;

class ReproductionsTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;

    public $searchBy = [
        'name',
        'remarks',
        'closed',
        'archived',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository(): Builder
    {
        return Reproduction::query()->withTrashed();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('translations.attributes.name'))->sortBy('name'),
            Header::title(__('translations.attributes.remarks'))->sortBy('remarks'),
            Header::title(__('translations.attributes.closed'))->sortBy('closed'),
            Header::title(__('translations.attributes.archived'))->sortBy('archived'),
            Header::title(__('translations.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translations.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translations.attributes.deleted_at'))->sortBy('deleted_at'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->name,
            $model->remarks,
            $model->closed,
            $model->archived,
            $model->created_at,
            $model->updated_at,
            $model->deleted_at,
        ];
    }
        
    protected function filters()
    {
        return [
            new SoftDeleteFilter,
        ];
    }

    protected function actionsByRow()
    {
        return [
            new EditReproductionAction('reproductions.edit', __('translations.actions.edit')),
            new SoftDeleteReproductionAction(),
            new RestoreReproductionAction()
        ];
    }

    public function softDelete(int $id)
    {
        $reproduction = Reproduction::find($id);
        $reproduction->delete();
        $this->notification()->success(
            $title = __('translations.messages.successes.destroy_title'),
            $description = __('reproductions.messages.successes.destroy', [
                'name' => $reproduction->name
            ])
            );
    }

    public function restore(int $id)
    {
        $reproduction = Reproduction::withTrashed()->find($id);
        $reproduction->restore();
        $this->notification()->success(
            $title = __('translations.messages.successes.restore_title'),
            $description = __('reproductions.messages.successes.restore', [
                'name' => $reproduction->name
            ])
        );
    }
}
