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
    $jwt = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJtZXJjdXJlIjp7InN1YnNjcmliZSI6WyIqIl19fQ.zJbUboXSfhcHK7QMU28MyRmfg3f3JC5_nC_YM98tqyA';
    $cookie = cookie('mercureAuthentication', $jwt, 10);
    cookie()->queue($cookie);

    return view('welcome');
});

Route::post('/publish', 'PublishController');
