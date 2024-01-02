<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;

class UsersComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.users.users-component')->layout('livewire.admin.layouts.base');
    }
}
