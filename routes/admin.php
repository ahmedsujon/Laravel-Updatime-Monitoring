<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Livewire\Admin\DashboardComponent;
use App\Livewire\Admin\Auth\LoginComponent;
use App\Livewire\Admin\Users\UsersComponent;
use App\Livewire\Admin\Users\AdminsComponent;
use App\Livewire\Admin\Auth\ForgotPasswordComponent;
use App\Livewire\Admin\Auth\UpdatePasswordComponent;
use App\Livewire\Admin\MySites\DetailsMySiteComponent;
use App\Livewire\Admin\MySites\MySitesComponent;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/

Route::get('admin/login', LoginComponent::class)->middleware('guest:admin')->name('admin.login');
Route::get('admin/forget-password', ForgotPasswordComponent::class)->middleware('guest:admin')->name('admin.forgetPassword');
Route::get('admin/change-password', UpdatePasswordComponent::class)->middleware('guest:admin')->name('admin.changePassword');

Route::get('admin', DashboardComponent::class)->middleware('auth:admin');
Route::prefix('admin/')->name('admin.')->middleware('auth:admin')->group(function(){
    Route::post('logout', [LogoutController::class, 'adminLogout'])->name('logout');

    Route::get('dashboard', DashboardComponent::class)->name('dashboard');
    
    // My site routes
    Route::get('my-sites', MySitesComponent::class)->name('mysites');
    Route::get('my-sites-details/{id}', DetailsMySiteComponent::class)->name('mysites.details');

    //user management
    Route::get('all-users', UsersComponent::class)->name('allUsers')->middleware('adminPermission:users_manage');
    Route::get('all-admins', AdminsComponent::class)->name('allAdmins')->middleware('adminPermission:admins_manage');
});
