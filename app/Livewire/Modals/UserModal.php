<?php

namespace App\Livewire\Modals;

use App\Actions\UpdateUser;
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

    public bool $edit = false;

    public function mount(User $user): void
    {
        abort_unless($user->id === auth()->id(), 403);
        $this->form = UserData::from($user);
        $this->form->password = '';
    }

    public function isEdit()
    {
        $this->edit = !$this->edit;
        if (!$this->edit) {
            $this->resetInputs();
        }
    }

    public function cancel()
    {
        $this->edit = false;
        $this->resetInputs();
    }

    public function save()
    {
        $this->validate();

        UpdateUser::run(UserData::validateAndCreate($this->form));

        $this->edit = false;
        $this->resetInputs();

        session()->flash('success', 'Пользовать успешно обновлен');
    }

    public function resetInputs()
    {
        $this->form = UserData::from($this->user);
        $this->form->password = '';
    }

    public function render()
    {
        return view('livewire.modals.user-modal');
    }

    protected function rules(): array
    {
        return collect(UserData::getValidationRules($this->form->toArray()))
            ->mapWithKeys(fn ($r, $k) => ["form.$k" => $r])
            ->all();
    }

}
