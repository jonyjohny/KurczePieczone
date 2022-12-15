<?php

namespace App\Http\Livewire\Reproductionreport;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\Reproductionrow;
use App\Models\ReproductionReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReproductionreportForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Reproductionrow $reproductionrow;
    public ReproductionReport $reproductionreport;
    public Bool $editMode;
    public User $user;

    public function rules()
    {
        return [
            'reproductionreport.nicHens' => [
            ],
            'reproductionreport.nicRoosters' => [
            ],
            'reproductionreport.cannibalismHens' => [
            ],
            'reproductionreport.cannibalismRoosters' => [
            ],
            'reproductionreport.debilityHens' => [
            ],
            'reproductionreport.debilityRoosters' => [
            ],
            'reproductionreport.otherHens' => [
            ],
            'reproductionreport.otherRoosters' => [
            ],
            'reproductionreport.fallsRemarks' => [
            ],
            'reproductionreport.goodEggs' => [
            ],
            'reproductionreport.badEggs' => [
            ],
            'reproductionreport.exportEggs' => [
            ],
            'reproductionreport.prevention' => [
            ],
            'reproductionreport.remarks' => [
            ],
        ];
    }

    public function validationAttributes(){
        return [
        ];
    }

    public function mount(Reproductionrow $reproductionrow, ReproductionReport $reproductionreport, Bool $editMode)
    {
        if($reproductionrow->id!=null){
            $this->reproductionrow=$reproductionrow;
        }else{
            $this->reproductionrow=$reproductionreport->reproductionrow;
        }
        $this->reproductionreport = $reproductionreport;
        $this->editMode = $editMode;
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.reproductionreport.reproductionreport-form');
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        
        if($this->editMode){
            $this->authorize('update', $this->reproductionreport);
        } else {
            $this->authorize('create', ReproductionReport::class);
        }
        $this->validate();
        $this->reproductionreport->user_id = $this->user->id;
        $this->reproductionrow->reproductionreport()->save($this->reproductionreport);
        $this->notification()->success(
            $title = $this->editMode
            ? __('reproductionreport.messages.successes.update_title')
            : __('reproductionreport.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('reproductionreport.messages.successes.updated')
            :__('reproductionreport.messages.successes.stored'),
        );
        $this->editMode = true;
    }
}