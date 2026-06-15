<?php

namespace App\Livewire;

use App\Actions\CreateNewUser;
use App\Livewire\Forms\UserForm;
use Livewire\Component;

class RegisterUserComponent extends Component
{
    public UserForm $form;

    public function save()
    {
        $this->form->validate();

        $data = $this->form->only(['user_name', 'password', 'email']);

        $user = CreateNewUser::run($data);

        $user->sendEmailVerificationNotification();

        session()->flash('success', 'Пользовать успешно создан');

        $this->redirect('/');

    }

    public function updatedEmail(): void
    {
        $this->form->resetValidation('email');
    }

    public function updatedPassword(): void
    {
        $this->form->resetValidation('password',);
    }

    public function updatedUserName(): void
    {
        $this->form->resetValidation('user_name');
    }

    public function render()
    {
        return view('livewire.user.register-user-component');
    }
}
