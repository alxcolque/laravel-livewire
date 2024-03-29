<?php

use App\Livewire\AppLivewire;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('apps', [AppLivewire::class, 'index'])->name('apps');

Auth::routes();
Route::get('/posts', [App\Livewire\Post::class, 'indexMethod']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
