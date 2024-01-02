<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;

class ForgotPasswordComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.auth.forgot-password-component')->layout('livewire.admin.auth.layouts.base');
    }
}
