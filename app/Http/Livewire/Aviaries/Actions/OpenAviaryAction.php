<?php

namespace App\Http\Livewire\Aviaries\Actions;

use LaravelViews\Actions\RedirectAction;
use LaravelViews\Views\View;

class OpenAviaryAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'log-in')
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('update', $model);
    }
}
