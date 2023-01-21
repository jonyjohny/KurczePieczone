<?php

namespace App\Http\Livewire\Reproductions;

use App\Models\Reproduction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Livewire\Component;
use WireUi\Traits\Actions;

class ReproductionForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Reproduction $reproduction;

    public Bool $editMode;

    public function rules()
    {
        return [
            'reproduction.name' => [
                'required',
                'string',
                'min:3',
            ],
            'reproduction.remarks' => [
            ],
            'reproduction.closed' => [
            ],
            'reproduction.archived' => [
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

    public function mount(Reproduction $reproduction, bool $editMode)
    {
        $this->reproduction = $reproduction;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.reproductions.reproduction-form');
    }

    public function update($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if ($this->editMode) {
            $this->authorize('update', $this->reproduction);
        } else {
            $this->authorize('create', Reproduction::class);
        }
        $this->validate();
        if($this->reproduction->closed==null) $this->reproduction->closed = 0;
        if($this->reproduction->archived==null) $this->reproduction->archived = 0;
        $this->reproduction->save();
        $this->notification()->success(
            $title = $this->editMode
            ? __('reproductions.messages.successes.update_title')
            : __('reproductions.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('reproductions.messages.successes.updated', ['name' => $this->reproduction->name])
            : __('reproductions.messages.successes.stored', ['name' => $this->reproduction->name]),
        );
        $this->editMode = true;
    }
}
