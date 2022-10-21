<?php

namespace App\Http\Livewire\Incubations;

use App\Models\Incubation;
use LaravelViews\Facades\Header;
use Illuminate\Contracts\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;

class IncubationsTableView extends TableView
{
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
        return Incubation::query()->withTrashed();
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
}
