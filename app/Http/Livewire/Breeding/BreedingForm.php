<?php

namespace App\Http\Livewire\Breeding;

use App\Models\Breeding;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class BreedingForm extends Component
{
    use Actions;

    public Breeding $breeding;
    public Bool $editMode;

    public function rules()
    {
        return [
            'breeding.name' => [
                'required',
                'string',
                'min:3'
            ],
            'breeding.remarks' => [
            ],
            'breeding.closed' => [
                'required',
                'boolean',
            ],
            'breeding.archived' => [
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

    public function mount(Breeding $breeding, Bool $editMode)
    {
        $this->breeding = $breeding;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.breeding.breeding-form');
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->breeding->save();
        $this->notification()->success(
            $title = $this->editMode
            ? __('breeding.messages.successes.update_title')
            : __('breeding.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('breeding.messages.successes.updated', ['name' => $this->breeding->name])
            :__('breeding.messages.successes.stored', ['name' => $this->breeding->name]),
        );
        $this->editMode = true;
    }
}