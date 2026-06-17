<?php

namespace App\Livewire;

use App\Actions\CreateNewUser;
use App\Data\UserData;

use Livewire\Component;

class RegisterUserComponent extends Component
{
    public UserData $form;

    public function mount(): void
    {
        $this->form = new UserData();
    }

    public function save()
    {
        $this->validate();

        $user = CreateNewUser::run(UserData::validateAndCreate($this->form));

        $user->sendEmailVerificationNotification();

        session()->flash('success', 'Пользовать успешно создан');

        $this->redirect('/');
    }

    protected function rules(): array
    {
        return collect(UserData::getValidationRules($this->form->toArray()))
            ->mapWithKeys(fn ($r, $k) => ["form.$k" => $r])
            ->all();
    }

    public function render()
    {
        return view('livewire.user.register-user-component');
    }
}
