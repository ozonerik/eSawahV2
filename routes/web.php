<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Backend\Dashboard;
use App\Http\Livewire\Backend\Profile;
use App\Http\Livewire\Backend\Result;
use App\Http\Livewire\Backend\Users;
use App\Http\Livewire\Backend\Infos;
use App\Http\Livewire\Backend\Sawahs;
use App\Http\Livewire\Backend\Pawongans;
use App\Http\Livewire\Backend\Gis;
use App\Http\Livewire\Backend\Appconfigs;
use App\Http\Livewire\Backend\Lanjas;
use App\Http\Livewire\Backend\Bayarlanjas;


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
    Route::get('/sawahs', Sawahs::class)->name('sawahs');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/pawongans', Pawongans::class)->name('pawongans');
    Route::get('/lanjas', Lanjas::class)->name('lanjas');
    Route::get('/bayarlanjas', Bayarlanjas::class)->name('bayarlanjas');
    Route::group(['middleware' => ['role:pro']], function () {
        Route::get('/giss', Gis::class)->name('giss');
    });
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/referensi', Appconfigs::class)->name('referensi');
        Route::get('/users', Users::class)->name('users');
        Route::get('/infos', Infos::class)->name('infos');
        Route::get('/giss', Gis::class)->name('giss');
    });
});
