<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Livewire\App\User\DashboardComponent;
use App\Livewire\App\User\Auth\LoginComponent;
use App\Livewire\App\User\Auth\RegisterComponent;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register User routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "User" middleware group. Now create something great!
|
*/

Route::get('/login', LoginComponent::class)->name('login')->middleware('guest');
Route::get('/register', RegisterComponent::class)->name('register')->middleware('guest');

Route::get('user', DashboardComponent::class)->middleware('auth:user');
Route::prefix('user/')->name('user.')->middleware('auth')->group(function(){
    Route::post('logout', [LogoutController::class, 'userLogout'])->name('logout');

    Route::get('dashboard', DashboardComponent::class)->name('dashboard');
});
