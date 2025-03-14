<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\backend\SliderController;
use Illuminate\Support\Facades\Route;


//Rota admin
Route::get('admin/dashboard',[AdminController::class, 'dashboard'])
->middleware(['auth','admin'])
->name('admin.dashboard');

//Rota admin ver perfil
Route::get('admin/profile', [ProfileController::class, 'index'])
->middleware(['auth','admin'])
->name('admin.profile');

//Rota admin atualizar perfil
Route::post('admin/profile/update', [ProfileController::class, 'update'])
->middleware(['auth','admin'])
->name('admin.profile.update');

//Rota admin atualizar a senha
Route::post('admin/profile/update/password', [ProfileController::class, 'updatePassword'])
->middleware(['auth','admin'])
->name('admin.profile.password');


//Rota Slider destaque - outra maneira, realiza rota para todos os métodos do cotroller
Route::resource('admin/slider', SliderController::class)
->middleware(['auth','admin']);

