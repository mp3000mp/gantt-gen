<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/account', [HomeController::class, 'account'])->name('account');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// SPA
Route::get('/{path}', [HomeController::class, 'index'])->name('home')->where('path', '(.*)');
