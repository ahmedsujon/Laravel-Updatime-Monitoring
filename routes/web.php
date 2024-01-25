<?php

use App\Livewire\App\HomeComponent;
use App\Livewire\App\SiteDetailsComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeComponent::class)->name('app.home');
Route::get('app-my-sites-details/{monitor_id}', SiteDetailsComponent::class)->name('app.mysites.details');

//Call Route Files
require __DIR__ . '/admin.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/user.php';
