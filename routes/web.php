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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('start');
})->middleware('auth');

Route::get('/', function () {
    $bauprojekte = DB::table('projects')->get();
    return view('start', ['bauprojekte' => $bauprojekte]);
})->middleware('auth');

Route::get('/bauprojekte', function () {
    $bauprojekte = DB::table('projects')->get();
    return view('bauprojekte', ['bauprojekte' => $bauprojekte]);
})->middleware('auth');

Route::post('/project', 'ProjectController@newProject')->name('newProject');

Route::get('/projects', 'ProjectController@projectsJson')->name('projectsJson');

Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');

Route::post('image-upload-post', 'ImageUploadController@imageUploadPost')->name('image.upload.post');
