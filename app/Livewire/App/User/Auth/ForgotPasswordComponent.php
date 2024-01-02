<?php

namespace App\Livewire\App\User\Auth;

use Livewire\Component;

class ForgotPasswordComponent extends Component
{
    public function render()
    {
        return view('livewire.app.user.auth.forgot-password-component')->layout('livewire.app.layouts.base');
    }
}
