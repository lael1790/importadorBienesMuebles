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

Route::get('home', function () {
    return view('welcome');
});

Route::get('convert', function () {
    return view('convert');
});

Route::get('import', function () {
    return view('import');
});

Route::post('uploadfile','UploadFileController@uploadFile');
Route::post('extract','ExtractFromFileController@extract');