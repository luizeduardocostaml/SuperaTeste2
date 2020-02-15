<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LoginController@getLogin')->name('getLogin');
Route::post('/login', 'LoginController@login')->name('login');

Route::get('/register', 'UserController@getRegister')->name('getRegister');
Route::post('/register', 'UserController@register')->name('register');


Route::middleware('auth')->group(function (){
    Route::get('/editUser', 'UserController@getEdit')->name('getEditUser');
    Route::post('/editUser', 'UserController@edit')->name('editUser');

    Route::get('/deleteUser', 'UserController@destroy')->name('deleteUser');

    Route::get('/logout', 'UserController@logout')->name('logout');

    Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
});

Route::middleware('auth')->group(function (){
    Route::get('/storeAddress', 'AdressController@getStore')->name('getStoreAddress');
    Route::post('/storeAddress', 'AdressController@store')->name('storeAddress');

    Route::get('/editAddress/{id}', 'AdressController@getEdit')->name('getEditAddress');
    Route::post('/editAddress/{id}', 'AdressController@edit')->name('editAddress');

    Route::get('/deleteAddress/{id}', 'AdressController@destroy')->name('deleteAddress');

    Route::get('/setActive/{id}', 'AdressController@setActive')->name('setActive');
});
