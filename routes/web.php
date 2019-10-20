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

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/', function () {
    return view('bauprojekte');
})->middleware('auth');

Route::get('/home', function () {
    return view('bauprojekte');
})->middleware('auth');

/*
Route::get('/home', function () {
    $bauprojekte = DB::table('projects')->get();
    return view('start', ['bauprojekte' => $bauprojekte]);
})->middleware('auth');
*/

Route::get('/bauprojekte', function () {
    return view('bauprojekte');
})->middleware('auth');

Route::get('/kontakte', function () {
    return view('kontakte');
})->middleware('auth');

Route::get('/gewerke', function () {
    return view('gewerke');
})->middleware('auth');

Route::post('/project', 'ProjectController@newProject')->name('newProject');

Route::get('/projects', 'ProjectController@projectsJson')->name('projectsJson');

Route::post('/contact', 'ContactController@newContact')->name('newContact');

Route::get('/contacts', 'ContactController@contactsJson')->name('contactsJson');

Route::patch('/contacts/{contactID}/update', 'ContactController@updateContact');

Route::get('/subareas', 'SubareaController@subareasJson')->name('subareasJson');

Route::patch('/subareas/{subareaID}/update', 'SubareaController@updateSubarea');

Route::patch('/projects/{projectID}/update', 'ProjectController@updateProject');

Route::get('/projects/{projectID}', 'ProjectController@getProject');

Route::get('/members/{projectID}', 'MemberController@projectMembersJson');

Route::get('/visits/{projectID}', 'VisitController@projectVisitsJson');

Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');

Route::post('image-upload-post', 'ImageUploadController@imageUploadPost')->name('image.upload.post');
