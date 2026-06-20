<?php

namespace App\Http\Controllers;


use App\Actions\oAuthCreateUser;
use App\Data\UserData;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    public function yandex()
    {
        return Socialite::driver('yandex')->redirect();
    }

    public function yandexRedirect()
    {
        $user = Socialite::driver('yandex')->user();
        $data = UserData::from([
            'id'=> $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'oAuthUser' => true
            ]);

        $user = oAuthCreateUser::run($data);

        Auth::login($user);
        session()->regenerate();

        return redirect('/wire/all');

    }


}
