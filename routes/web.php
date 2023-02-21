<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::get('login', 'App\Http\Controllers\AuthController@login');
Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::get('register', 'App\Http\Controllers\AuthController@register');
Route::post('register', 'App\Http\Controllers\AuthController@register');
Route::get('welcome','App\Http\Controllers\AuthController@welcome');

Route::get('createProduct', 'App\Http\Controllers\ProductController@createProduct');
Route::post('createProduct', 'App\Http\Controllers\ProductController@createProduct');

