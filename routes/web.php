<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthManager; // Import the AuthManager class

Route::get('/', function () {
    return view('welcome');
});
Route::post('/preregisters', [ClientController::class, 'store'])->name('preregisters.store');
Route::get('/preregistration', [AuthManager::class, 'preregistration'])->name('preregistration');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('/blank-page', [App\Http\Controllers\HomeController::class, 'blank'])->name('blank');

    Route::get('/admin', [ClientController::class, 'caselist'])->name('admin.index')->middleware('admin');
    Route::delete('/admin/delete/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('admin.delete')->middleware('admin');
    Route::get('/search', [ClientController::class, 'search'])->name('clients.search');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('admin.delete');

    /*  Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('admin'); */

    Route::get('/admin/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit')->middleware('admin');
    Route::put('/admin/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update')->middleware('admin');
    Route::delete('/admin/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.delete')->middleware('admin');
});
