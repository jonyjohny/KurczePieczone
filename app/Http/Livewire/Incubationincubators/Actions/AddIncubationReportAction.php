<?php

namespace App\Http\Livewire\Incubationincubators\Actions;

use LaravelViews\Actions\RedirectAction;
use LaravelViews\Views\View;

class AddIncubationReportAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'plus')
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('update', $model);
    }
}
