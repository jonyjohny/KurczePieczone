<?php

namespace App\Http\Livewire\Incubations\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class RestoreIncubationAction extends Action
{
    public $title = '';

    public $icon = 'trash';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('translations.actions.restore');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => __('incubations.dialogs.restore.title'),
            'description' => __('incubations.dialogs.restore.description', [
                'name' => $model->name,
            ]),
            'icon' => 'question',
            'iconColor' => 'text-green-500',
            'accept' => [
                'label' => __('translations.yes'),
                'method' => 'restore',
                'params' => $model->id,
            ],
            'rejest' => [
                'label' => __('translations.no'),
            ],
        ]);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('restore', $model);
    }
}
