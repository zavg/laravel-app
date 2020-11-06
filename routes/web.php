<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Auth::routes();

Route::get('login/github', [LoginController::class, 'redirectToProvider'])->name('login.github');
Route::get('login/github/callback', [LoginController::class, 'handleProviderCallback'])->name('login.github.callback');

Route::resource('repos', 'RepoController');

Route::get('/home', 'RepoController@index')->name('home');

