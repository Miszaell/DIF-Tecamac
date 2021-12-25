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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', function () {return view("pages.index");})->name('home');
Route::get('users', function () {return view("pages.index");})->name('users');
Route::get('comunication', function () {return view("pages.index");})->name('comunication');
Route::get('documents', function () {return view("pages.index");})->name('documents');
Route::get('images', function () {return view("pages.index");})->name('images');
Route::get('login',function () {return view("pages.index");})->name('login');;
Route::view('ubris', 'ubris.index')->name('ubris');
