<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Backend\Dashboard;
use App\Http\Livewire\Backend\Profile;
use App\Http\Livewire\Backend\Result;
use App\Http\Livewire\Backend\Users;
use App\Http\Livewire\Backend\Info;


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

Route::get('/', Home::class);
Route::get('/home', Home::class)->name('home');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/result', Result::class)->name('result');
    Route::get('/profile', Profile::class)->name('profile');
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/users', Users::class)->name('users');
        Route::get('/info', Info::class)->name('info');
    });
});
