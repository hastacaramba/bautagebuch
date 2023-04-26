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

Route::delete('/project/{projectID}', 'ProjectController@deleteProject')->name('deleteProject')->middleware('auth');

Route::get('/projects', 'ProjectController@projectsJson')->name('projectsJson')->middleware('auth');

Route::post('/contact', 'ContactController@newContact')->name('newContact')->middleware('auth');

Route::delete('/contact/{contactID}', 'ContactController@deleteContact')->name('deleteContact')->middleware('auth');

Route::get('/contacts', 'ContactController@contactsJson')->name('contactsJson')->middleware('auth');

Route::get('/contacts/select', 'ContactController@getContactsSelect')->name('contactsSelect')->middleware('auth');

Route::patch('/contacts/{contactID}/update', 'ContactController@updateContact')->middleware('auth');

Route::get('/reports', 'ReportController@reportsJson')->name('reportsJson')->middleware('auth');

Route::get('/reports/{visitID}', 'ReportController@visitReportsJson')->name('visitReportsJson')->middleware('auth');

Route::get('/report/{reportID}/send', 'ReportController@sendReport')->name('sendReport')->middleware('auth');

Route::delete('/report/{reportID}', 'ReportController@deleteReport')->name('deleteReport')->middleware('auth');

Route::post('/subarea', 'SubareaController@newSubarea')->name('newSubarea')->middleware('auth');

Route::get('/subareas', 'SubareaController@subareasJson')->name('subareasJson')->middleware('auth');

Route::delete('/subarea/{subareaID}', 'SubareaController@deleteSubarea')->name('deleteSubarea')->middleware('auth');

Route::get('/subareas/select', 'SubareaController@getSubareasSelect')->name('subareasSelect')->middleware('auth');

Route::patch('/subareas/{subareaID}/update', 'SubareaController@updateSubarea')->middleware('auth');

Route::patch('/projects/{projectID}/update', 'ProjectController@updateProject')->middleware('auth');

Route::get('/projects/{projectID}', 'ProjectController@getProject')->middleware('auth');

Route::post('/member', 'MemberController@newMember')->middleware('auth');

Route::delete('/member/{memberID}', 'MemberController@deleteMember')->middleware('auth');

Route::get('/members/{projectID}', 'MemberController@projectMembersJson')->middleware('auth');

Route::post('/visit/new/{projectID}', 'VisitController@createVisit')->middleware('auth');

Route::get('/visits/{projectID}', 'VisitController@projectVisitsJson')->middleware('auth');

Route::patch('/visit/{visitID}', 'VisitController@updateVisit')->middleware('auth');

Route::get('/visit/{visitID}', 'VisitController@showVisit')->middleware('auth');

Route::delete('/visit/{visitID}', 'VisitController@deleteVisit')->middleware('auth');

Route::get('/visit/{visitID}/json', 'VisitController@getVisit')->middleware('auth');

Route::get('/visit/{visitID}/presence', 'VisitController@getPresentMembers')->middleware('auth');

Route::get('/visitationnote/concerned/{visitationnoteID}', 'VisitationnoteController@getConcernedMembers')->middleware('auth');

Route::patch('/visit/{visitID}/presence', 'VisitController@setPresentMembers')->middleware('auth');

Route::patch('/visit/{visitID}/subscribe', 'VisitController@setSubscriptions')->middleware('auth');

Route::get('/visit/{visitID}/media', 'VisitController@getVisitMedia')->middleware('auth');

Route::get('/visit/{visitID}/pdf', 'VisitController@getVisitPdfs')->middleware('auth');

Route::patch('/visitationnote/{visitationnoteID}/concerned', 'VisitationnoteController@setConcernedMembers')->middleware('auth');

Route::patch('/visitationnote/{visitationnoteID}/important', 'VisitationnoteController@setImportant')->middleware('auth');

Route::get('/visitationnotes/{visitID}', 'VisitationnoteController@visitVisitationnotes')->middleware('auth');

Route::get('/visitationnotesByProject/{projectID}', 'VisitationnoteController@projectVisitationnotes')->middleware('auth');

Route::post('/visitationnote', 'VisitationnoteController@newVisitationnote')->middleware('auth');

Route::patch('/visitationnote/update/{visitationnoteID}', 'VisitationnoteController@updateVisitationnote')->middleware('auth');

Route::get('/visitationnote/media/{visitationnoteID}', 'VisitationnoteController@getMedia')->middleware('auth');

Route::patch('/visitationnote/{visitationnoteID}', 'VisitationnoteController@setDone')->middleware('auth');

Route::delete('/visitationnote/{visitationnoteID}', 'VisitationnoteController@deleteVisitationnote')->middleware('auth');

Route::post('/exportvisit/save', 'PdfController@savePdfData')->middleware('auth');

Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload')->middleware('auth');

Route::post('image-upload-post', 'ImageUploadController@imageUploadPost')->name('image.upload.post')->middleware('auth');

Route::post('/image-upload-post-visitationnote', 'ImageUploadController@imageUploadPostVisitationnote')->name('image.upload.post.visitationnote')->middleware('auth');

Route::post('/image-upload-post-visit', 'ImageUploadController@imageUploadPostVisit')->name('image.upload.post.visit')->middleware('auth');

Route::post('/image-upload-post-edited-visit', 'ImageUploadController@imageUploadPostEditedVisit')->name('image.upload.post.edited.visit')->middleware('auth');

Route::get('pdf-upload', 'PdfUploadController@pdfUpload')->name('pdf.upload')->middleware('auth');

Route::post('pdf-upload-post', 'PdfUploadController@pdfUploadPost')->name('pdf.upload.post')->middleware('auth');

Route::post('/pdf-upload-post-visit', 'PdfUploadController@pdfUploadPostVisit')->name('pdf.upload.post.visit')->middleware('auth');

Route::post('/pdf-upload-post-edited-visit', 'PdfUploadController@pdfUploadPostEditedVisit')->name('pdf.upload.post.edited.visit')->middleware('auth');

Route::delete('/media/{mediaID}', 'MediaController@deleteMedia')->name('media.delete')->middleware('auth');

Route::patch('/media/{mediaID}', 'MediaController@editMedia')->name('media.edit')->middleware('auth');

Route::patch('/media/rotate/{mediaID}', 'ImageController@rotateImg')->name('media.rotate')->middleware('auth');

Route::patch('/media/rotate-filename/{filename}', 'ImageController@rotateImgByFileName')->name('media.rotateByFileName')->middleware('auth');

Route::delete('/pdf/{pdfID}', 'PdfMediaController@deletePdf')->name('pdf.delete')->middleware('auth');

Route::patch('/pdf/{pdfID}', 'PdfMediaController@editPdf')->name('pdf.edit')->middleware('auth');

Route::post('/projectnote', 'ProjectController@newProjectNote')->name('projectnote.new')->middleware('auth')->middleware('auth');

Route::get('/projectnotes/{projectID}', 'ProjectController@getProjectNotes')->name('projectnotes')->middleware('auth');

Route::patch('/projectnote/{projectnoteID}', 'ProjectController@setDoneStatus')->name('projectnote.setDone')->middleware('auth');

Route::get('/projectnote/{projectnoteID}', 'ProjectController@getProjectNote')->name('projectnote.get')->middleware('auth');

Route::delete('/projectnote/{projectnoteID}', 'ProjectController@deleteProjectNote')->name('projectnote.delete')->middleware('auth');

Route::get('/projectnote/concerned/{projectnoteID}', 'ProjectController@getConcernedMembers')->name('projectnote.concerned')->middleware('auth');

Route::patch('/projectnote/{projectnoteID}/concerned', 'ProjectController@setConcernedMembers')->middleware('auth');

Route::patch('/projectnote/update/{projectnoteID}', 'ProjectController@updateProjectNote')->middleware('auth');

/* ------------ Image Control ------------ */

Route::get('resizeImage', 'ImageController@resizeImage');

Route::post('resizeImagePost', 'ImageController@resizeImagePost')->name('resizeImagePost');


/* ------------ TCPDF Routen ------------ */

Route::get('/PdfDemo/{idString}', ['as'=>'PdfDemo','uses'=>'PdfController@index']);
Route::get('/sample-pdf', ['as'=>'SamplePDF','uses'=>'PdfController@samplePDF']);
Route::get('/save-pdf', ['as'=>'SavePDF','uses'=>'PdfController@savePDF']);
Route::get('/download-pdf', ['as'=>'DownloadPDF','uses'=>'PdfController@downloadPDF']);
Route::get('/html-to-pdf', ['as'=>'HtmlToPDF','uses'=>'PdfController@htmlToPDF']);


// clear view compiled files
Route::get('/clear-view-compiled-cache', function() {
    Artisan::call('view:clear');
    return "View compiled files removed";
});