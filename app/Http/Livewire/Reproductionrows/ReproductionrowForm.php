<?php

namespace App\Http\Livewire\Reproductionrows;

use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\Reproduction;
use App\Models\Reproductionrow;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReproductionrowForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Reproduction $reproduction;
    public Reproductionrow $reproductionrow;
    public Bool $editMode;

    public function rules()
    {
        return [
            'reproductionrow.name' => [
                'required',
                'string',
                'min:3'
            ],
            'reproductionrow.remarks' => [
            ],
            'reproductionrow.id_user' => [
                'required',
            ],
            'reproductionrow.id_reproduction' => [
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

    public function mount(Reproductionrow $reproductionrow, Bool $editMode)
    {
        $this->reproductionrow = $reproductionrow;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.reproductionrows.reproductionrow-form');
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if($this->editMode){
            $this->authorize('update', $this->reproductionrow);
        } else {
            $this->authorize('create', Reproductionrow::class);
        }
        $this->validate();
        $this->reproductionrow->save();
        $this->notification()->success(
            $title = $this->editMode
            ? __('reproductionrows.messages.successes.update_title')
            : __('reproductionrows.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('reproductionrows.messages.successes.updated', ['name' => $this->reproductionrow->name])
            :__('reproductionrows.messages.successes.stored', ['name' => $this->reproductionrow->name]),
        );
        $this->editMode = true;
    }
}