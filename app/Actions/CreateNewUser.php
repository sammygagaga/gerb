<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateNewUser
{
    use AsAction;

    public function handle($data)
    {
        $this->createUser($data);
    }

    private function createUser($data): User
    {
        $user = new User;

        $user->name = $data['user_name'];
        $user->password = bcrypt($data['password']);
        $user->email = $data['email'];

        $user->save();

        return $user;

    }
}
