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

//livewire routes
Route::prefix('/wire')
    ->middleware(AuthMiddleware::class)
    ->group(function (){
     Route::get('/all', AllProducts::class);

});

Route::controller(UserController::class)->group(function (){
//    Route::get('/register', 'create')->name('users.create');
//    Route::get('/', 'index')->name('users.index');
    Route::get('/logout', 'logout')->name('users.logout');
//    Route::post('/login', 'login')->name('users.login');
//    Route::post('/', 'store')->name('users.store');
});

//Route::controller(GerbController::class)
//    ->middleware(AuthMiddleware::class)
//    ->group(function (){
//    Route::get('/all', 'all')->name('products.all');
//    Route::post('/update', 'update')->name('products.update');
//    Route::post('/store', 'store')->name('products.store');
//    Route::get('/create', 'create')->name('products.create');
//    Route::delete('/', 'delete')->name('products.delete');
//    Route::get('/{product}','product')->name('products.product');
//    Route::get('/edit/{product}','edit')->name('products.edit');
//});


