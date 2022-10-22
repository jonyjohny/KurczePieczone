<?php

namespace App\Http\Livewire\Incubations;

use App\Models\Incubation;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class IncubationForm extends Component
{
    use Actions;

    public Incubation $incubation;
    public Bool $editMode;

    public function rules()
    {
        return [
            'incubation.name' => [
                'required',
                'string',
                'min:3'
            ],
            'incubation.remarks' => [
            ],
            'incubation.closed' => [
                'required',
                'boolean',
            ],
            'incubation.archived' => [
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

    public function mount(Incubation $incubation, Bool $editMode)
    {
        $this->incubation = $incubation;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.incubations.incubation-form');
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->incubation->save();
        $this->notification()->success(
            $title = $this->editMode
            ? __('incubations.messages.successes.update_title')
            : __('incubations.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('incubations.messages.successes.updated', ['name' => $this->incubation->name])
            :__('incubations.messages.successes.stored', ['name' => $this->incubation->name]),
        );
        $this->editMode = true;
    }
}