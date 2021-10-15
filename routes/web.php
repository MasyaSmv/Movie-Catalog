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

// надстройки аудентификации
Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['midleware' => 'auth'], function(){
    Route::get('/home',  [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index']) -> name('index');
Route::get('/movies/{movie}', [App\Http\Controllers\MainController::class, 'show']) -> name('show');
