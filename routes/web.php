<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\LoginController;
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


Route::get('/account/login',[LoginController::class,'index'])->name('account.login');
Route::post('/account/authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
Route::get('/account/register',[LoginController::class,'register'])->name('account.register');
Route::post('/account/processRegister',[LoginController::class,'processRegister'])->name('account.processRegister');

Route::prefix('account')->middleware(['auth.user'])->group(function(){
Route::get('/dashboard',[dashboardController::class,'index'])->name('account.dashboard');
Route::get('/logout',[LoginController::class,'logout'])->name('account.logout');
});