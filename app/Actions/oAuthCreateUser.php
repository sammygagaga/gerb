<?php

namespace App\Actions;

use App\Data\UserData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class oAuthCreateUser
{
    use AsAction;

    public function handle(UserData $data)
    {
        return $this->updateOrCreate($data);
    }

    private function updateOrCreate(UserData $data): User
    {
        return User::updateOrCreate(
            ['email' => $data->email],
            [
                'name' => $data->name,
                'email' => $data->email,
                'email_verified_at' => \Illuminate\Support\now(),
                'oAuth_user' => $data->oAuthUser
            ]
        );
    }
}
