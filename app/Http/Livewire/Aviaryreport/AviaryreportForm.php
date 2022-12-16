<?php

namespace App\Http\Livewire\Aviaryreport;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Aviaryplace;
use App\Models\AviaryReport;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AviaryreportForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Aviaryplace $aviaryplace;
    public AviaryReport $aviaryreport;
    public Bool $editMode;
    public User $user;

    public function rules()
    {
        return [
            'aviaryreport.feeding' => [
            ],
            'aviaryreport.cure' => [
            ],
            'aviaryreport.hensExport' => [
            ],
            'aviaryreport.roostersExport' => [
            ],
            'aviaryreport.destination' => [
            ],
            'aviaryreport.hensFalls' => [
            ],
            'aviaryreport.roostersFalls' => [
            ],
            'aviaryreport.remarksFalls' => [
            ],
            'aviaryreport.remarks' => [
            ],
        ];
    }

    public function validationAttributes(){
        return [
        ];
    }

    public function mount(Aviaryplace $aviaryplace, AviaryReport $aviaryreport, Bool $editMode)
    {
        if($aviaryplace->id!=null){
            $this->aviaryplace=$aviaryplace;
        }else{
            $this->aviaryplace=$aviaryreport->aviaryplace;
        }
        $this->aviaryreport = $aviaryreport;
        $this->editMode = $editMode;
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.aviaryreport.aviaryreport-form');
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        
        if($this->editMode){
            $this->authorize('update', $this->aviaryreport);
        } else {
            $this->authorize('create', AviaryReport::class);
        }
        $this->validate();
        $this->aviaryreport->user_id = $this->user->id;
        $this->aviaryplace->aviaryreport()->save($this->aviaryreport);
        $this->notification()->success(
            $title = $this->editMode
            ? __('aviaryreport.messages.successes.update_title')
            : __('aviaryreport.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('aviaryreport.messages.successes.updated')
            :__('aviaryreport.messages.successes.stored'),
        );
        $this->editMode = true;
    }
}