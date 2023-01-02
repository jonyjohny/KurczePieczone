<?php

namespace App\Http\Livewire\Breedingreport;

use App\Models\Breedingplace;
use App\Models\BreedingReport;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;

class BreedingreportForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Breedingplace $breedingplace;

    public BreedingReport $breedingreport;

    public Bool $editMode;

    public User $user;

    public function rules()
    {
        return [
            'breedingreport.falls' => [
            ],
            'breedingreport.selection' => [
            ],
            'breedingreport.mainTemperature' => [
            ],
            'breedingreport.hallTemperature' => [
            ],
            'breedingreport.humidity' => [
            ],
            'breedingreport.fodder' => [
            ],
            'breedingreport.water' => [
            ],
            'breedingreport.lighting' => [
            ],
            'breedingreport.lightingRemarks' => [
            ],
            'breedingreport.ventilation' => [
            ],
            'breedingreport.animalsTaken' => [
            ],
            'breedingreport.destination' => [
            ],
            'breedingreport.remarks' => [
            ],
        ];
    }

    public function validationAttributes()
    {
        return [
        ];
    }

    public function mount(Breedingplace $breedingplace, BreedingReport $breedingreport, bool $editMode)
    {
        if ($breedingplace->id != null) {
            $this->breedingplace = $breedingplace;
        } else {
            $this->breedingplace = $breedingreport->breedingplace;
        }
        $this->breedingreport = $breedingreport;
        $this->editMode = $editMode;
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.breedingreport.breedingreport-form');
    }

    public function update($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if ($this->editMode) {
            $this->authorize('update', $this->breedingreport);
        } else {
            $this->authorize('create', BreedingReport::class);
        }
        $this->validate();
        $this->breedingreport->user_id = $this->user->id;
        $this->breedingplace->breedingreport()->save($this->breedingreport);
        $this->notification()->success(
            $title = $this->editMode
            ? __('breedingreport.messages.successes.update_title')
            : __('breedingreport.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('breedingreport.messages.successes.updated')
            : __('breedingreport.messages.successes.stored'),
        );
        $this->editMode = true;
    }
}
