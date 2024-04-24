<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThemeController;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout',[LoginController::class,'logout']);
// Admin Routes List
Route::middleware(['auth', 'useraccess:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/show', [AdminController::class, 'show'])->name('show.admin');
    Route::post('/admin/valide/{id}', [AdminController::class, 'valide'])->name('valid.admin');
    Route::post('/admin/devalide/{id}', [AdminController::class, 'devalide'])->name('devalid.admin');
    Route::get('/admin/delete/{id}', [AdminController::class, 'delete'])->name('delete.admin');
});

// SuperAdmin Routes List
Route::middleware(['auth', 'useraccess:superadmin'])->group(function () {
    Route::get('/SuperAdmin/home', [HomeController::class, 'superAdminHome'])->name('superadmin.home');
});

// Moderateur Routes List
Route::middleware(['auth', 'useraccess:moderateur'])->group(function () {
    Route::get('/moderateur/home', [HomeController::class, 'moderateurHome'])->name('moderateur.home');
});

// Normal Users Routes List
Route::middleware(['auth', 'useraccess:user'])->group(function () {
    Route::get('/user/home', [HomeController::class, 'index'])->name('user.home');
    Route::get('/user/ajouterTheme',[ThemeController::class, 'create'])->name('user.addTheme');
    Route::post('/user/sauvegarder-theme', [ThemeController::class, 'sauvegarder'])->name('save.theme');
    Route::get('/user/lister',[ThemeController::class, 'lister'])->name('user.lister');
    Route::get('/user/delete/{id}', [ThemeController::class, 'supprimer'])->name('delete.user');
});
