<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public User $user;
    public Bool $editMode;
    public $editModeSecurity;

    public function rules()
    {
        return [
            'user.name' => [
                'required',
                'string',
                'min:3'
            ],
            'user.email' => [
                'required',
                'unique:users,email' . 
                ($this->editMode ? (',' . $this->user->id) : ''),
            ],
            'user.password' => [
                'required',
            ]
        ];
    }

    public function validationAttributes(){
        return [
            'name' => Str::lower(__('users.attributes.name')),
            'email' => Str::lower(__('users.attributes.email')),
            'password' => Str::lower(__('users.attributes.password'))
        ];
    }

    public function mount(User $user, Bool $editMode)
    {
        $this->user = $user;
        $this->editModeSecurity = $user->password;
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.users.user-form');
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if($this->editMode){
            $this->authorize('update', $this->user);
        } else {
            $this->authorize('create', User::class);
        }
        if ($this->editModeSecurity!=$this->user->password){
            $this->user->password = Hash::make($this->user->password);
        }
        $this->user->save();
        $this->notification()->success(
            $title = $this->editMode
            ? __('users.messages.successes.update_title')
            : __('users.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('users.messages.successes.updated', ['name' => $this->user->name])
            :__('users.messages.successes.stored', ['name' => $this->user->name]),
        );
        $this->editMode = true;
    }
}