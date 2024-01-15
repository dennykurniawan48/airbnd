<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginForm extends Component
{
    public $username = "";
    public $password = "";
    public $showPassword = false;

    public $error = "";

    public function render()
    {
        return view('livewire.login-form')->title('Login');
    }

    public function login()
    {
        $this->error = "";
        $validated = $this->validate([
            'username' => 'email|required',
            'password' => 'string|required',
        ]);

        $user = User::where('email', '=', $validated['username'])->first();

        if (!$user) {
            $this->error = 'Email not registered';
        } else {
            if (Hash::check($validated['password'], $user->password)) {
                Auth::login($user);
                $this->redirectRoute('home');
            } else {
                $this->error = 'Wrong credentials';
            }
        }
    }

    public function setShowPassword()
    {
        $this->showPassword = !$this->showPassword;
    }
}
