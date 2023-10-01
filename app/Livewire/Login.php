<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

#[Title('Login')]
#[Layout('layouts.guest')]
class Login extends Component
{
    #[Rule('required','email','exists:users,email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {
        if (Auth::attempt($this->validate())) {
            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'email' => 'Email and password is not match'
        ]);

    }
}
