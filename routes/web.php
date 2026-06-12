<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GerbController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Livewire\AllProducts;
use App\Livewire\LoginUserComponent;
use App\Livewire\RegisterUserComponent;

Route::get('/', LoginUserComponent::class);
Route::get('/register', RegisterUserComponent::class)->name('register');


Route::prefix('/wire')
    ->middleware(AuthMiddleware::class)
    ->group(function (){
     Route::get('/all', AllProducts::class);
});

Route::controller(UserController::class)->group(function (){
    Route::get('/logout', 'logout')->name('users.logout');
});



