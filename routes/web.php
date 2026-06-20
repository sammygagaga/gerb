<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Livewire\AllProducts;
use App\Livewire\LoginUserComponent;
use App\Livewire\RegisterUserComponent;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AuthenticatedSessionController;

Route::get('/', LoginUserComponent::class);
Route::get('/register', RegisterUserComponent::class)->name('register');

Route::prefix('/wire')
    ->middleware(AuthMiddleware::class)
    ->middleware(['verified'])
    ->group(function (){
     Route::get('/all', AllProducts::class);
});

Route::get('/auth/yandex', [AuthenticatedSessionController::class, 'yandex'])->name('yandex');
Route::get('/auth/yandex/redirect', [AuthenticatedSessionController::class, 'yandexRedirect'])->name('yandex.redirect');

//default email verification
Route::get('/email/verify', function () {
   return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/wire/all');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function () {
    auth()->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


