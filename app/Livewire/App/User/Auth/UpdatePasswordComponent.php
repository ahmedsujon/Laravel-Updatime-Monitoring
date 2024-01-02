<?php

namespace App\Livewire\App\User\Auth;

use Livewire\Component;

class UpdatePasswordComponent extends Component
{
    public function render()
    {
        return view('livewire.app.user.auth.update-password-component')->layout('livewire.app.layouts.base');
    }
}
