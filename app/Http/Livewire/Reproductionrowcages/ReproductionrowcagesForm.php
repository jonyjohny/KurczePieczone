<?php

namespace App\Http\Livewire\Reproductionrowcages;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\Reproductionrow;
use App\Models\ReproductionReport;
use App\Models\Reproductionrowcages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReproductionrowcagesForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Reproductionrow $reproductionrow;
    public Reproductionrowcages $reproductionrowcage;
    public Bool $editMode;
    public User $user;

    public function rules()
    {
        return [
            'reproductionrowcage.number' => [
            ],
            'reproductionrowcage.remarks' => [
            ],
        ];
    }

    public function validationAttributes(){
        return [
        ];
    }

    public function mount(Reproductionrow $reproductionrow, Reproductionrowcages $reproductionrowcage, Bool $editMode)
    {
        if($reproductionrow->id!=null){
            $this->reproductionrow=$reproductionrow;
        }else{
            $this->reproductionrow=$reproductionrowcage->reproductionrow;
        }
        $this->reproductionrowcage = $reproductionrowcage;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.reproductionrowcages.reproductionrowcages-form');
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        
        if($this->editMode){
            $this->authorize('update', $this->reproductionrowcage);
        } else {
            $this->authorize('create', Reproductionrowcages::class);
        }
        $this->validate();
        $this->reproductionrow->reproductionrowcage()->save($this->reproductionrowcage);
        $this->notification()->success(
            $title = $this->editMode
            ? __('reproductionrowcages.messages.successes.update_title')
            : __('reproductionrowcages.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('reproductionrowcages.messages.successes.updated')
            :__('reproductionrowcages.messages.successes.stored'),
        );
        $this->editMode = true;
    }
}