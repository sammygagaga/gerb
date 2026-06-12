<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class LoginUserComponent extends ModalComponent
{
    #[Validate('required')]
    public string $email;

    #[Validate('required')]
    public string $password;

    public function updatedEmail(): void
    {
        $this->resetErrorBag('user_not_found');
    }

    public function save()
    {
        $this->validate();

        if (Auth::attempt($this->only(['email', 'password']))) {

            session()->regenerate();

            return redirect()->intended('/wire/all');
        }

       $this->addError('user_not_found', 'Неверный логин или пароль');

    }

    public function render()
    {
        return view('livewire.user.login-user-component');
    }
}
