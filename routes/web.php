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

Route::get('/form','Project1Controller@form');
Route::post('/form/check','Project1Controller@check')->name('project1.check');
Route::get('/reform','Project1Controller@reform')->name('project1.reform');
Route::get('/form/mail','Project1Controller@mail')->name('project1.mail');
Route::get('/form/mail/fin','Project1Controller@fin')->name('project1.fin');
Route::get('/', function () {
    return redirect('/form');
});

