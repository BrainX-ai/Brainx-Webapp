<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\LinkedinController;

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

Route::get('/talent', function () {
    return view('pages.index');
})->name('talent.home');
Route::get('/', function () {
    return view('pages.business');
})->name('home');
Route::get('/privacy-policy', function () {
    return view('pages.privacy');
});
Route::get('/terms-of-service', function () {
    return view('pages.terms');
});
Route::get('/pending', 'App\http\controllers\TalentProfileController@showPendingPage')->name('talent.pending');


Route::get('/job-details/{id}', 'App\http\controllers\JobController@jobDetails')->name('talent.job.details');
Route::get('/job-details', 'App\http\controllers\JobController@jobDetail')->name('talent.job.detail');
Route::get('/view-profile/{id}', 'App\http\controllers\TalentProfileController@show')->name('show.profile');
Route::get('/build-profile', 'App\http\controllers\TalentProfileController@index')->name('build.profile');
Route::get('/talent-care', 'App\http\controllers\JobController@talentCare')->name('talent.care');
Route::post('/submit-profile','App\http\controllers\TalentProfileController@store')->name('submit.profile');
Route::post('/submit-contract','App\http\controllers\ContractController@store')->name('submit.contract');
Route::post('/end-contract','App\http\controllers\ContractController@endContract')->name('end.contract');
Route::post('/add-experience','App\http\controllers\TalentProfileController@addExperience')->name('add.experience');
Route::post('/add-education','App\http\controllers\TalentProfileController@addEducation')->name('add.education');
Route::post('/accept-request','App\http\controllers\JobController@acceptRequest')->name('accept.request');
Route::post('/reject-request','App\http\controllers\JobController@rejectRequest')->name('reject.request');
Route::get('/client-view', 'App\http\controllers\TalentProfileController@showTalentProfile')->name('client.view');
Route::post('/submit-for-review', 'App\http\controllers\TalentProfileController@submitForReview')->name('submit.for.review');

Route::post('/update-hourly-rate', 'App\http\controllers\TalentProfileController@updateHourlyRate')->name('updateHourlyRate');
Route::post('/update-hours-per-week','App\http\controllers\TalentProfileController@updateHoursPerWeek')->name('updateHoursPerWeek');
Route::post('/update-ex-famous-company','App\http\controllers\TalentProfileController@updateExFamousCompany')->name('updateExFamousCompany');
Route::post('/update-bio','App\http\controllers\TalentProfileController@updateBio')->name('updateBio');
Route::post('/update-experience','App\http\controllers\TalentProfileController@updateExp')->name('updateExp');
Route::post('/update-education','App\http\controllers\TalentProfileController@updateEdu')->name('updateEdu');

Route::get('/assessment/{category_id}', 'App\http\controllers\AssesmentController@assessment')->name('assessment.init');
Route::get('/quiz-running/{category_id}', 'App\http\controllers\AssesmentController@generateQuestions')->name('assessment.running');
Route::get('/assessment/progress/{index}', 'App\http\controllers\AssesmentController@getQuestion')->name('assessment.progress');
Route::post('/send-answer', 'App\http\controllers\AssesmentController@getAnswer')->name('assessment.sendAnswer');;
Route::get('/results', 'App\http\controllers\AssesmentController@results')->name('assessment.result');

// chat routes

Route::post('/send-message','App\http\controllers\ChatController@sendMessage')->name('send.message');
Route::post('/upload-chat-file', 'App\http\controllers\ChatController@uploadChatFile')->name('upload.chat.file');
Route::get('/download-chat-file/{file_id}', 'App\http\controllers\ChatController@downloadFile')->name('download.chat.file');


Route::get('/redirect/admin/{id}','App\http\controllers\Client\AuthController@redirectToAdmin')->name('redirectToAdmin');

Route::prefix('/client')->as('client.')->group(function () {
    
    Route::post('/auth/register','App\http\controllers\Client\AuthController@register')->name('register');    
    Route::post('/auth/login','App\http\controllers\Client\AuthController@login')->name('login');
});

Route::prefix('/client')->as('client.')->middleware(['auth','verified'])->group(function () {
    
    Route::get('/dashboard','App\http\controllers\Client\JobController@jobsPage')->name('dashboard');   
    Route::get('/job-request/new','App\http\controllers\Client\JobController@create')->name('job.new'); 
    Route::post('/job-request/create','App\http\controllers\Client\JobController@store')->name('job.create'); 
    Route::get('/job-details/{id}','App\http\controllers\Client\JobController@jobDetails')->name('job.details'); 
    Route::get('/job-detail','App\http\controllers\Client\JobController@jobDetail')->name('job.detail');    
    Route::get('/view-talent-profile/{id}', 'App\http\controllers\Client\JobController@showTalentProfile')->name('show.profile');
    Route::post('/request-invoice', 'App\http\controllers\Client\JobController@requestInvoice')->name('requestInvoice');
    Route::post('/approve-deposit', 'App\http\controllers\Client\JobController@approveDeposit')->name('approveDeposit');
});


Route::domain('admin.' . env('APP_URL'))->middleware('auth')->group(function () {
    
    require __DIR__ . '/admin.php';
});

Route::prefix('/admin')->middleware('auth')->group(function () {
    
    
    require __DIR__ . '/admin.php';
});

Route::domain('admin.' . env('APP_URL'))->group(function () {
    
    Route::get('/login','App\http\controllers\Admin\AuthController@index')->name('admin.login.form');
    Route::post('/auth/login','App\http\controllers\Admin\AuthController@login')->name('admin.login');
});

Route::prefix('/admin')->group(function () {
  
    Route::get('/login','App\http\controllers\Admin\AuthController@index')->name('admin.login.form');
    Route::post('/auth/login','App\http\controllers\Admin\AuthController@login')->name('admin.login');
});

Route::group(['middleware' => ['auth']], function() {
    
    /**
    * Verification Routes
    */
    // Route::get('/email/verify', 'App\http\controllers\Email\VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'App\http\controllers\Email\VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'App\http\controllers\Email\VerificationController@resend')->name('verification.resend');
  
});

Route::get('/email/verify', function () {
    return view('pages.client.pages.notice');
})->middleware('auth')->name('verification.notice');
//Feedback

Route::post('feedback','App\http\Controllers\FeedbackController@store')->name('feedback.store');
Route::post('email/isexist','App\http\Controllers\Client\AuthController@isEmailExist')->name('email.isexist');

 
Route::get('auth/linkedin', [LinkedinController::class, 'linkedinRedirect']);
Route::get('auth/linkedin/callback', [LinkedinController::class, 'linkedinCallback']);
require __DIR__ . '/auth.php';
