<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResortController;
use App\Http\Controllers\DashboardController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//resort view
Route::resource('/resort', 'App\Http\Controllers\ResortController');

//list page
Route::get('/', 'App\Http\Controllers\ResortController@listProperty');
Route::get('/about', 'App\Http\Controllers\ResortController@about');
Route::get('/offers', 'App\Http\Controllers\ResortController@offers');

//ADMIN dashboard
Route::resource('/admin', 'App\Http\Controllers\DashboardController')->middleware('auth');

//User home login dashboard
Route::get('home', 'App\Http\Controllers\ResortController@dashboard')->middleware('auth');




