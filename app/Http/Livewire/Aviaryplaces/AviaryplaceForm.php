<?php

namespace App\Http\Livewire\Aviaryplaces;

use App\Models\Aviary;
use App\Models\Aviaryplace;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Livewire\Component;
use WireUi\Traits\Actions;

class AviaryplaceForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Aviary $aviary;

    public Aviaryplace $aviaryplace;

    public Bool $editMode;

    public function rules()
    {
        return [
            'aviaryplace.id_user' => [
                'required',
            ],
            'aviaryplace.aviaryplace_id' => [
            ],
            'aviaryplace.name' => [
                'required',
            ],
            'aviaryplace.remarks' => [
                'required',
            ],
            'aviaryplace.animals' => [
                'required',
            ],
            'aviaryplace.hens' => [
            ],
            'aviaryplace.roosters' => [
                'required',
            ],
            'aviaryplace.age' => [
            ],
            'aviaryplace.added' => [
            ],
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => Str::lower(__('translations.attributes.name')),
            'remarks' => Str::lower(__('translations.attributes.remarks')),
            'users' => Str::lower(__('translations.attributes.patroness')),
            'animals' => Str::lower(__('aviaryplaces.labels.animals')),
            'hens' => Str::lower(__('aviaryplaces.labels.hens')),
            'roosters' => Str::lower(__('aviaryplaces.labels.roosters')),
            'age' => Str::lower(__('aviaryplaces.labels.age')),
            'added' => Str::lower(__('translations.attributes.added')),
        ];
    }

    public function mount(Aviary $aviary, Aviaryplace $aviaryplace, bool $editMode)
    {
        if ($aviary->id != null) {
            $this->aviary = $aviary;
        } else {
            $this->aviary = $aviaryplace->aviary;
        }
        $this->aviaryplace = $aviaryplace;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.aviaryplaces.aviaryplace-form');
    }

    public function update($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if ($this->editMode) {
            $this->authorize('update', $this->aviaryplace);
        } else {
            $this->authorize('create', Aviaryplace::class);
        }
        $this->validate();
        $this->aviaryplace->added = date('Y-m-d H:i:s', strtotime($this->aviaryplace->added));
        $this->aviary->aviaryplace()->save($this->aviaryplace);
        $this->notification()->success(
            $title = $this->editMode
            ? __('aviaryplaces.messages.successes.update_title')
            : __('aviaryplaces.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('aviaryplaces.messages.successes.updated', ['name' => $this->aviaryplace->name])
            : __('aviaryplaces.messages.successes.stored', ['name' => $this->aviaryplace->name]),
        );
        $this->editMode = true;
    }
}
