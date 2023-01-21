<?php

namespace App\Http\Livewire\Incubations;

use App\Models\Incubation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Livewire\Component;
use WireUi\Traits\Actions;

class IncubationForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Incubation $incubation;

    public Bool $editMode;

    public function rules()
    {
        return [
            'incubation.name' => [
                'required',
                'string',
                'min:3',
            ],
            'incubation.remarks' => [
            ],
            'incubation.closed' => [
            ],
            'incubation.archived' => [
            ],
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => Str::lower(__('translations.attributes.name')),
            'remarks' => Str::lower(__('translations.attributes.remarks')),
            'closed' => Str::lower(__('translations.attributes.closed')),
            'archived' => Str::lower(__('translations.attributes.archived')),
        ];
    }

    public function mount(Incubation $incubation, bool $editMode)
    {
        $this->incubation = $incubation;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.incubations.incubation-form');
    }

    public function update($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if ($this->editMode) {
            $this->authorize('update', $this->incubation);
        } else {
            $this->authorize('create', Incubation::class);
        }
        $this->validate();
        if($this->incubation->closed==null) $this->incubation->closed = 0;
        if($this->incubation->archived==null) $this->incubation->archived = 0;
        $this->incubation->save();
        $this->notification()->success(
            $title = $this->editMode
            ? __('incubations.messages.successes.update_title')
            : __('incubations.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('incubations.messages.successes.updated', ['name' => $this->incubation->name])
            : __('incubations.messages.successes.stored', ['name' => $this->incubation->name]),
        );
        $this->editMode = true;
    }
}
