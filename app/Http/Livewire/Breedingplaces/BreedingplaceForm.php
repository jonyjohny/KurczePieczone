<?php

namespace App\Http\Livewire\Breedingplaces;

use Livewire\Component;
use App\Models\Breeding;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\Breedingplace;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BreedingplaceForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Breeding $breeding;
    public Breedingplace $breedingplace;
    public Bool $editMode;

    public function rules()
    {
        return [
            'breedingplace.name' => [
                'required',
                'string',
                'min:3'
            ],
            'breedingplace.remarks' => [
            ],
            'breedingplace.id_user' => [
                'required',
            ],
            'breedingplace.id_breeding' => [
            ],
            'breedingplace.animals' => [
                'required',
            ],
            'breedingplace.added' => [
                'required',
            ],
        ];
    }

    public function validationAttributes(){
        return [
            'name' => Str::lower(__('translations.attributes.name')),
            'remarks' => Str::lower(__('translations.attributes.remarks')),
            'users' => Str::lower(__('translations.attributes.patroness')),
            'animals' => Str::lower(__('breedingplaces.labels.animals')),
            'added' => Str::lower(__('translations.attributes.added')),
        ];
    }

    public function mount(Breeding $breeding, Breedingplace $breedingplace, Bool $editMode)
    {
        if($breeding->id!=null){
            $this->breeding=$breeding;
        }else{
            $this->breeding=$breedingplace->breeding;
        }
        $this->breedingplace = $breedingplace;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.breedingplaces.breedingplace-form');
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if($this->editMode){
            $this->authorize('update', $this->breedingplace);
        } else {
            $this->authorize('create', Breedingplace::class);
        }
        $this->validate();
        $this->breeding->breedingplace()->save($this->breedingplace);
        $this->notification()->success(
            $title = $this->editMode
            ? __('breedingplaces.messages.successes.update_title')
            : __('breedingplaces.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('breedingplaces.messages.successes.updated', ['name' => $this->breedingplace->name])
            :__('breedingplaces.messages.successes.stored', ['name' => $this->breedingplace->name]),
        );
        $this->editMode = true;
    }
}