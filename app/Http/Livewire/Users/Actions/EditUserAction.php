<?php

namespace App\Http\Livewire\Users\Actions;

use LaravelViews\Actions\RedirectAction;
use LaravelViews\Views\View;

class EditUserAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'edit')
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('delete', $model);
    }
}
