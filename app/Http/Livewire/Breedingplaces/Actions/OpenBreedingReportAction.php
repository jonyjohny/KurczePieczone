<?php

namespace App\Http\Livewire\Breedingplaces\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use LaravelViews\Actions\RedirectAction;


class OpenBreedingReportAction extends RedirectAction
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