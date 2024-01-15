<?php

use App\Http\Controllers\GoogleLoginController;
use App\Livewire\Home;
use App\Livewire\LoginForm;
use App\Livewire\Order;
use App\Livewire\RegisterForm;
use App\Livewire\RentProperty;
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

Route::get('/', Home::class)->name('home');
Route::get('/login', LoginForm::class)->name('login');
Route::get('/register', RegisterForm::class)->name('register');
Route::get('/order', Order::class)->name('order');
Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogle'])->name('google.callback');
Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('login'));
})->name('logout');
Route::get('/{id}', RentProperty::class)->name('rent');