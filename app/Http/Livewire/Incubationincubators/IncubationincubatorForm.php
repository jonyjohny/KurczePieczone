<?php

namespace App\Http\Livewire\Incubationincubators;

use Livewire\Component;
use App\Models\Incubation;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\Incubationincubator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IncubationincubatorForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Incubation $incubation;
    public Incubationincubator $incubationincubator;
    public Bool $editMode;

    public function rules()
    {
        return [
            'incubationincubator.name' => [
                'required',
                'string',
                'min:3'
            ],
            'incubationincubator.remarks' => [
            ],
            'incubationincubator.id_user' => [
                'required',
            ],
            'incubationincubator.id_incubation' => [
            ],
            'incubationincubator.eggs' => [
                'required',
            ],
            'incubationincubator.added' => [
                'required',
            ],
        ];
    }

    public function validationAttributes(){
        return [
            'name' => Str::lower(__('translations.attributes.name')),
            'remarks' => Str::lower(__('translations.attributes.remarks')),
            'users' => Str::lower(__('translations.attributes.patroness')),
            'eggs' => Str::lower(__('incubationincubators.labels.eggs')),
            'added' => Str::lower(__('translations.attributes.added')),
        ];
    }

    public function mount(Incubation $incubation, Incubationincubator $incubationincubator, Bool $editMode)
    {
        if($incubation->id!=null){
            $this->incubation=$incubation;
        }else{
            $this->incubation=$incubationincubator->incubation;
        }
        $this->incubationincubator = $incubationincubator;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.incubationincubators.incubationincubator-form');
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if($this->editMode){
            $this->authorize('update', $this->incubationincubator);
        } else {
            $this->authorize('create', Incubationincubator::class);
        }
        $this->validate();
        $this->incubationincubator->added = date("Y-m-d H:i:s", strtotime($this->incubationincubator->added));
        $this->incubation->incubationincubator()->save($this->incubationincubator);
        $this->notification()->success(
            $title = $this->editMode
            ? __('incubationincubators.messages.successes.update_title')
            : __('incubationincubators.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('incubationincubators.messages.successes.updated', ['name' => $this->incubationincubator->name])
            :__('incubationincubators.messages.successes.stored', ['name' => $this->incubationincubator->name]),
        );
        $this->editMode = true;
    }
}