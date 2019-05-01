<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pengguna/login', 'PenggunaLoginController@showLoginForm')->name('pengguna.loginform');
Route::get('/pengguna/register', 'PenggunaLoginController@showRegisterForm')->name('pengguna.registerform');
Route::post('/pengguna/login', 'PenggunaLoginController@login')->name('pengguna.login');
Route::post('/pengguna/register', 'PenggunaLoginController@register')->name('pengguna.register');
Route::get('/pengguna/home', 'PenggunaLoginController@index')->middleware('auth:pengguna');
Route::get('/pengguna/logout', 'PenggunaLoginController@logout')->name('pengguna.logout');
