<?php

namespace App\Http\Livewire\Reproductions\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class SoftDeleteReproductionAction extends Action
{
    public $title = '';

    public $icon = 'trash-2';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('translations.actions.destroy');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => __('reproductions.dialogs.soft_delete.title'),
            'description' => __('reproductions.dialogs.soft_delete.description', [
                'name' => $model->name,
            ]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translations.yes'),
                'method' => 'softDelete',
                'params' => $model->id,
            ],
            'rejest' => [
                'label' => __('translations.no'),
            ],
        ]);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('delete', $model);
    }
}
