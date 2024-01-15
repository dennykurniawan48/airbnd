<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name = "";
    public $email = "";
    public $password = "";

    public $error = "";
    public $showPassword = false;
    public function render()
    {
        return view('livewire.register-form')->title('Register');
    }

    public function setShowPassword(){
        $this->showPassword = !$this->showPassword;
    }

    public function register(){
        $this->error = "";

        $validated = $this->validate([
            "name" => "string|required|min:3",
            "email" => "email|required",
            "password" => "string|min:6"
        ]);

        $user = User::where("email", "=", $validated['email'])->first();
        if($user){
            $this->error = 'Email is registered';
        }else{
            $newUser = new User();
            $newUser->name = $validated['name'];
            $newUser->email = $validated['email'];
            $newUser->password = Hash::make($validated['password']);
            $newUser->save();
            session()->flash('success', 'Success register.');
            $this->redirectRoute('login');
        }
    }
}
