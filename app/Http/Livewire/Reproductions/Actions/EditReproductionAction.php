<?php

namespace App\Http\Livewire\Reproductions\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\RedirectAction;

class EditReproductionAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'edit')
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        return $model->deleted_at == null;
    }


}