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


use App\Http\Controllers\PasswordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/password', [PasswordController::class, 'showForm'])->name('password.form');
Route::post('/password', [PasswordController::class, 'submit'])->name('password.submit');


Route :: get ('/{id}', function ($id) {
    echo 'Emp '.$id;
    });