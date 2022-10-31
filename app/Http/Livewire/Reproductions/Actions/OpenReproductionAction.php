<?php

namespace App\Http\Livewire\Reproductions\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;


class OpenReproductionAction extends Action
{
    public $to = 'reproductionrows.index';
    public $title = '';
    public $icon = 'log-in';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('translations.actions.open');
    }

}