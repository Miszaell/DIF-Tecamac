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
Route::get('home', function () {return view("pages.index");})->name('home');

Route::get('users', function () {return view("pages.index");})->name('users');
Route::get('user-detail', function () {return view("pages.index");})->name('user-detail');

Route::get('comunication', function () {return view("pages.index");})->name('comunication');
Route::get('comunication-detail', function () {return view("pages.index");})->name('comunication-detail');

Route::get('files', function () {return view("pages.index");})->name('files');
Route::get('file-detail', function () {return view("pages.index");})->name('file-detail');

Route::get('media', function () {return view("pages.index");})->name('media');
Route::get('image-detail', function () {return view("pages.index");})->name('image-detail');

Route::get('login', function () {return view("pages.index");})->name('login');

Route::get('read-pdf', function () {return view("pages.index");})->name('read-pdf');

Route::get('test', function () {return view("pages.index");})->name('test');

Route::view('ubris', 'ubris.index')->name('ubris');
