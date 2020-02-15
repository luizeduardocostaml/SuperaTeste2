<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LoginController@getLogin')->name('getLogin');
Route::post('/login', 'LoginController@login')->name('login');

Route::get('/register', 'LoginController@getRegister')->name('getRegister');
Route::post('/register', 'LoginController@register')->name('register');

Route::get('/editUser', 'UserController@getEditUser')->name('getEditUser');
Route::get('/editUser/{id}', 'UserController@editUser')->name('editUser');

Route::get('/dashboard', 'LoginController@dashboard')->name('dashboard');

