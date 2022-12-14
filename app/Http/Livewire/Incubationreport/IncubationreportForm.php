<?php

namespace App\Http\Livewire\Incubationreport;

use App\Models\Incubationincubator;
use App\Models\IncubationReport;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;

class IncubationreportForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Incubationincubator $incubationincubator;

    public IncubationReport $incubationreport;

    public Bool $editMode;

    public User $user;

    public function rules()
    {
        return [
            'incubationreport.impregnation' => [
            ],
            'incubationreport.eggTest' => [
            ],
            'incubationreport.remarks' => [
            ],
        ];
    }

    public function validationAttributes()
    {
        return [
        ];
    }

    public function mount(Incubationincubator $incubationincubator, IncubationReport $incubationreport, bool $editMode)
    {
        if ($incubationincubator->id != null) {
            $this->incubationincubator = $incubationincubator;
        } else {
            $this->incubationincubator = $incubationreport->incubationincubator;
        }
        $this->incubationreport = $incubationreport;
        $this->editMode = $editMode;
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.incubationreport.incubationreport-form');
    }

    public function update($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if ($this->editMode) {
            $this->authorize('update', $this->incubationreport);
        } else {
            $this->authorize('create', IncubationReport::class);
        }
        $this->validate();
        $this->incubationreport->eggTest = date('Y-m-d H:i:s', strtotime($this->incubationreport->eggTest));
        $this->incubationreport->user_id = $this->user->id;
        $this->incubationincubator->incubationreport()->save($this->incubationreport);
        $this->notification()->success(
            $title = $this->editMode
            ? __('incubationreport.messages.successes.update_title')
            : __('incubationreport.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('incubationreport.messages.successes.updated')
            : __('incubationreport.messages.successes.stored'),
        );
        $this->editMode = true;
    }
}
