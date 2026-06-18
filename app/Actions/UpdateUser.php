<?php

namespace App\Actions;

use App\Data\UserData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateUser
{
    use AsAction;

    public function handle(UserData $data)
    {
        return $this->update($data);
    }

    private function update(UserData $data): User
    {
        $user = User::find($data->id);
        $user->update($data->toArray());

        return $user;
    }
}
