<?php

namespace App\Http\Livewire\Aviaryplaces;

use App\Models\Aviary;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Aviaryplace;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AviaryplaceForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Aviary $aviary;
    public Aviaryplace $aviaryplace;
    public Bool $editMode;

    public function rules()
    {
        return [
            'aviaryplace.name' => [
                'required',
                'string',
                'min:3'
            ],
            'aviaryplace.remarks' => [
            ],
            'aviaryplace.id_user' => [
                'required',
            ],
            'aviaryplace.id_aviary' => [
            ],
        ];
    }

    public function validationAttributes(){
        return [
            'name' => Str::lower(__('translations.attributes.name')),
            'remarks' => Str::lower(__('translations.attributes.remarks')),
            'users' => Str::lower(__('translations.attributes.patroness')),
        ];
    }

    public function mount(Aviaryplace $aviaryplace, Bool $editMode)
    {
        $this->aviaryplace = $aviaryplace;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.aviaryplaces.aviaryplace-form');
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if($this->editMode){
            $this->authorize('update', $this->aviaryplace);
        } else {
            $this->authorize('create', Aviaryplace::class);
        }
        $this->validate();
        $this->aviaryplace->save();
        $this->notification()->success(
            $title = $this->editMode
            ? __('aviaryplaces.messages.successes.update_title')
            : __('aviaryplaces.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('aviaryplaces.messages.successes.updated', ['name' => $this->aviaryplace->name])
            :__('aviaryplaces.messages.successes.stored', ['name' => $this->aviaryplace->name]),
        );
        $this->editMode = true;
    }
}