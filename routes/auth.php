<?php

use App\Http\Controllers\Auth\UnauthorizedController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthorizedController;
use App\Http\Controllers\PermissionsController;


Route::post('/profile',[UnauthorizedController::class,'login_do'])->name('auth.login.do');;


Route::middleware('guest')->group(function(){
    Route::view('/register','auth.register')->name('auth.register');
    Route::post('/register.do',[UnauthorizedController::class,'register_do'])->name('auth.register.do');
});



Route::middleware('auth')->group(function(){
    Route::view('/profile','auth.profile')->name('auth.profile');
    Route::post('/profile.update',[AuthorizedController::class,'profile_update'])->name('auth.profile.update');
    Route::get('/logout',[AuthorizedController::class,'logout'])->name('auth.logout');
});


/*
    Route::view('/profile','auth.profile')->name('auth.profile');
    Route::post('/profile.update',[AuthorizedController::class,'profile_update'])->name('auth.profile.update');
    Route::get('/logout',[AuthorizedController::class,'logout'])->name('auth.logout');

    Route::get('/editor',[PermissionsController::class,'getAllUsers'])->name('auth.editor');

    Route::get('/editor/user/{id}',[PermissionsController::class,'editUser'])->name('auth.user.edit');
    Route::put('/editor/user/{id}',[PermissionsController::class,'updateUser'])->name('auth.user.update');

    Route::get('/editor/{id}/delete',[PermissionsController::class,'deleteUser'])->name('auth.user.destroy');

    Route::view('/editor/create','auth.create')->name('auth.user.create');
    Route::post('/editor',[PermissionsController::class,'addUser'])->name('auth.user.create.do');*/


Route::middleware('auth','permission:admin')->group(function(){
    Route::get('/editor',[PermissionsController::class,'getAllUsers'])->name('auth.editor');

    Route::get('/editor/update/user/{id}',[PermissionsController::class,'editUser'])->name('auth.user.update');
    Route::put('/editor/update/user/{id}',[PermissionsController::class,'updateUser'])->name('auth.user.update.do');

    Route::get('/editor/{id}/delete',[PermissionsController::class,'deleteUser'])->name('auth.user.destroy');
    Route::get('/editor/{id}/reset',[PermissionsController::class,'resetPassword'])->name('auth.user.reset');

    Route::get('/editor/{id}/block',[PermissionsController::class,'blockUser'])->name('auth.user.block');
    Route::get('/editor/{id}/unblock',[PermissionsController::class,'unblockUser'])->name('auth.user.unblock');
    Route::get('/editor/create/user',[PermissionsController::class,'createUser'])->name('auth.user.create');
    Route::post('/editor',[PermissionsController::class,'addUser'])->name('auth.user.create.do');
    Route::get('/editor/create/group',[PermissionsController::class,'getAllGroups'])->name('auth.group.create');
    Route::post('/editor/create/group/new',[PermissionsController::class,'addGroup'])->name('auth.group.create.do');
});
Route::view('/register_done', 'auth.register_done')->name('auth.register.done');
