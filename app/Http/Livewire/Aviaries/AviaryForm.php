<?php

namespace App\Http\Livewire\Aviaries;

use App\Models\aviary;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class aviaryForm extends Component
{
    use Actions;

    public Aviary $aviary;
    public Bool $editMode;

    public function rules()
    {
        return [
            'aviary.name' => [
                'required',
                'string',
                'min:3'
            ],
            'aviary.remarks' => [
            ],
            'aviary.closed' => [
                'required',
                'boolean',
            ],
            'aviary.archived' => [
                'required',
                'boolean',
            ]
        ];
    }

    public function validationAttributes(){
        return [
            'name' => Str::lower(__('translations.attributes.name')),
            'remarks' => Str::lower(__('translations.attributes.remarks')),
            'closed' => Str::lower(__('translations.attributes.closed')),
            'archived' => Str::lower(__('translations.attributes.archived'))
        ];
    }

    public function mount(Aviary $aviary, Bool $editMode)
    {
        $this->aviary = $aviary;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.aviaries.aviary-form');
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->aviary->save();
        $this->notification()->success(
            $title = $this->editMode
            ? __('aviaries.messages.successes.update_title')
            : __('aviaries.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('aviaries.messages.successes.updated', ['name' => $this->aviary->name])
            :__('aviaries.messages.successes.stored', ['name' => $this->aviary->name]),
        );
        $this->editMode = true;
    }
}