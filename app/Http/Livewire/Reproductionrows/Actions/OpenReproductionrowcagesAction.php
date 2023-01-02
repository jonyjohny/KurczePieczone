<?php

namespace App\Http\Livewire\Reproductionrows\Actions;

use LaravelViews\Actions\RedirectAction;
use LaravelViews\Views\View;

class OpenReproductionrowcagesAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'log-in')
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('delete', $model);
    }
}
