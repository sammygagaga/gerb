<?php

namespace App\Livewire\Modals;

use App\Data\UserData;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Locked;
use LivewireUI\Modal\ModalComponent;

class UserModal extends ModalComponent
{
    use AuthorizesRequests;

    #[Locked]
    public User $user;

    public UserData $form;

    public function mount(User $user): void
    {
        $this->form = UserData::from($user);
    }

    public function sss()
    {
        // сделать обновление данных пользователя
    }

    public function render()
    {
        return view('livewire.modals.user-modal');
    }
}
