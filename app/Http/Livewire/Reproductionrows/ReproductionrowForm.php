<?php

namespace App\Http\Livewire\Reproductionrows;

use App\Models\Reproduction;
use App\Models\Reproductionrow;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Livewire\Component;
use WireUi\Traits\Actions;

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
                'min:3',
            ],
            'reproductionrow.remarks' => [
            ],
            'reproductionrow.id_user' => [
                'required',
            ],
            'reproductionrow.roosters' => [
                'required',
            ],
            'reproductionrow.hens' => [
                'required',
            ],
            'reproductionrow.added' => [
                'required',
            ],
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => Str::lower(__('translations.attributes.name')),
            'remarks' => Str::lower(__('translations.attributes.remarks')),
            'users' => Str::lower(__('translations.attributes.patroness')),
            'roosters' => Str::lower(__('reproductionrows.labels.roosters')),
            'hens' => Str::lower(__('reproductionrows.labels.hens')),
            'added' => Str::lower(__('translations.attributes.added')),
        ];
    }

    public function mount(Reproduction $reproduction, Reproductionrow $reproductionrow, bool $editMode)
    {
        if ($reproduction->id != null) {
            $this->reproduction = $reproduction;
        } else {
            $this->reproduction = $reproductionrow->reproduction;
        }
        $this->reproductionrow = $reproductionrow;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.reproductionrows.reproductionrow-form');
    }

    public function update($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if ($this->editMode) {
            $this->authorize('update', $this->reproductionrow);
        } else {
            $this->authorize('create', Reproductionrow::class);
        }
        $this->validate();
        $this->reproductionrow->added = date('Y-m-d H:i:s', strtotime($this->reproductionrow->added));
        $this->reproduction->reporductionRow()->save($this->reproductionrow);
        $this->notification()->success(
            $title = $this->editMode
            ? __('reproductionrows.messages.successes.update_title')
            : __('reproductionrows.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('reproductionrows.messages.successes.updated', ['name' => $this->reproductionrow->name])
            : __('reproductionrows.messages.successes.stored', ['name' => $this->reproductionrow->name]),
        );
        $this->editMode = true;
    }
}
