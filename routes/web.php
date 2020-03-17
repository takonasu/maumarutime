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
    return view('top');
});

Route::get('/make', 'MainController@makeImage');

Route::get('/result', 'MainController@result');

Route::get('/twitter', 'MainController@twitter');

Route::get('/callback', 'MainController@callback');

Route::get('/sass', function () {
    return view('sass');
});
