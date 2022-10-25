<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('login', [\App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\HomeController::class, 'postLogin'])->name('post-login');

Route::get('logout', [\App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::middleware(['auth:web'])->prefix('admin')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('links', [\App\Http\Controllers\AdminController::class, 'links'])->name('admin.links');
    Route::post('links', [\App\Http\Controllers\AdminController::class, 'postLinks'])->name('admin.post-links');
    Route::get('link/create', [\App\Http\Controllers\AdminController::class, 'addLink'])->name('admin.add-links');
    Route::post('link/create', [\App\Http\Controllers\AdminController::class, 'createLink'])->name('admin.create-links');
    Route::post('link/{id}', [\App\Http\Controllers\AdminController::class, 'deleteLink'])->name('admin.delete-links');
});
