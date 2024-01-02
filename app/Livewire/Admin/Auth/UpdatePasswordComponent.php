<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;

class UpdatePasswordComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.auth.update-password-component')->layout('livewire.admin.auth.layouts.base');
    }
}
