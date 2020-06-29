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
    return redirect('home');
});

Auth::routes();

Route::get('home', 'FormController@index');


Route::get('/odk-builder', function () {
    return view('welcome');
});

// Route::get('odk-builder/{id}', function () {
//     return view('edit');
// });

Route::post('survey-builder-selected', 'FormController@download');

Route::get('odk-builder/{id}', 'FormController@show');
