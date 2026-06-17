<?php

namespace App\Actions;

use App\Data\UserData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateNewUser
{
    use AsAction;

    public function handle(UserData $data)
    {
        return $this->createUser($data);
    }

    private function createUser(UserData $data): User
    {
        $user = new User;

        $user->name = $data->name;
        $user->password = bcrypt($data->password);
        $user->email = $data->email;

        $user->save();

        return $user;

    }
}
