<?php

namespace App\Livewire\App\User\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterComponent extends Component
{
    public $first_name, $last_name, $email, $phone, $password, $confirm_password;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8|max:30',
            'confirm_password' => 'required|min:8|max:30|same:password',
        ]);
    }

    public function userRegistration()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8|max:30',
            'confirm_password' => 'required|min:8|max:30|same:password',
        ]);

        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->password = Hash::make($this->password);
        $user->avatar = 'assets/images/avatar.png';
        if ($user->save()) {
            $getUsr = User::find($user->id);
            $getUsr->username = Str::lower($getUsr->first_name . '_' . $getUsr->last_name . '_' . $getUsr->id);
            $getUsr->save();

            Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]);
            session()->flash('success', 'Registration successful');
            return redirect()->route('user.dashboard');
        }
    }
    
    public function render()
    {
        return view('livewire.app.user.auth.register-component')->layout('livewire.app.layouts.base');
    }
}
