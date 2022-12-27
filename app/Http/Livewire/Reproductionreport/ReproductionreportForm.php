<?php

namespace App\Http\Livewire\Reproductionreport;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\ReproductionReport;
use App\Models\Reproductionrowcages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReproductionreportForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Reproductionrowcages $reproductionrowcage;
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

    public function mount(Reproductionrowcages $reproductionrowcage, ReproductionReport $reproductionreport, Bool $editMode)
    {
        if($reproductionrowcage->id!=null){
            $this->reproductionrowcage=$reproductionrowcage;
        }else{
            $this->reproductionrowcage=$reproductionreport->reproductionrowcage;
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
        $this->reproductionreport->reproductionrow_id = $this->reproductionrowcage->reproductionrow_id;
        $this->reproductionrowcage->reproductionreport()->save($this->reproductionreport);
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