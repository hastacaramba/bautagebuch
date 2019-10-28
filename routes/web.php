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

Auth::routes(['register' => false]);

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

Route::post('/project', 'ProjectController@newProject')->name('newProject')->middleware('auth');

Route::get('/projects', 'ProjectController@projectsJson')->name('projectsJson')->middleware('auth');

Route::post('/contact', 'ContactController@newContact')->name('newContact')->middleware('auth');

Route::get('/contacts', 'ContactController@contactsJson')->name('contactsJson')->middleware('auth');

Route::get('/contacts/select', 'ContactController@getContactsSelect')->name('contactsSelect')->middleware('auth');

Route::patch('/contacts/{contactID}/update', 'ContactController@updateContact')->middleware('auth');

Route::get('/subareas', 'SubareaController@subareasJson')->name('subareasJson')->middleware('auth');

Route::get('/subareas/select', 'SubareaController@getSubareasSelect')->name('subareasSelect')->middleware('auth');

Route::patch('/subareas/{subareaID}/update', 'SubareaController@updateSubarea')->middleware('auth');

Route::patch('/projects/{projectID}/update', 'ProjectController@updateProject')->middleware('auth');

Route::get('/projects/{projectID}', 'ProjectController@getProject')->middleware('auth');

Route::post('/member', 'MemberController@newMember')->middleware('auth');

Route::delete('/member/{memberID}', 'MemberController@deleteMember')->middleware('auth');

Route::get('/members/{projectID}', 'MemberController@projectMembersJson')->middleware('auth');

Route::get('/visit/new/{projectID}', 'VisitController@createVisit')->middleware('auth');

Route::get('/visits/{projectID}', 'VisitController@projectVisitsJson')->middleware('auth');

Route::patch('/visit/{visitID}', 'VisitController@updateVisit')->middleware('auth');

Route::get('/visit/{visitID}', 'VisitController@showVisit')->middleware('auth');

Route::get('/visit/{visitID}/json', 'VisitController@getVisit')->middleware('auth');

Route::get('/visit/{visitID}/presence', 'VisitController@getPresentMembers')->middleware('auth');

Route::get('/visitationnotes/{visitID}', 'VisitationnoteController@projectVisitationnotes')->middleware('auth');

Route::post('/export/save', 'PdfController@savePdfData')->middleware('auth');

Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload')->middleware('auth');

Route::post('image-upload-post', 'ImageUploadController@imageUploadPost')->name('image.upload.post')->middleware('auth');



/* ------------ TCPDF Routen ------------ */

Route::get('/PdfDemo/{idString}', ['as'=>'PdfDemo','uses'=>'PdfController@index']);
Route::get('/sample-pdf', ['as'=>'SamplePDF','uses'=>'PdfController@samplePDF']);
Route::get('/save-pdf', ['as'=>'SavePDF','uses'=>'PdfController@savePDF']);
Route::get('/download-pdf', ['as'=>'DownloadPDF','uses'=>'PdfController@downloadPDF']);
Route::get('/html-to-pdf', ['as'=>'HtmlToPDF','uses'=>'PdfController@htmlToPDF']);