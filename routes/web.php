<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\LinkedinController;
use App\Models\User;
use App\Http\Controllers\PayPalController;
use App\Http\Livewire\SearchService;
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

// Route::get('/talent', function () {
//     return view('pages.index');
// })->name('talent.home');


Route::group(
    ['middleware' => 'throttle:40,1'],
    function () {
        Route::get('/', function () {

            $publishedTalents = User::with('talent')->where('role', 'Talent')->orderBy('id', 'DESC')->get();

            return view('pages.business')->with('talents', $publishedTalents);
        })->name('home');
        Route::get('/privacy-policy', function () {
            return view('pages.privacy');
        });
        Route::get('/terms-of-service', function () {
            return view('pages.terms');
        });
        Route::get('/how-it-works', function () {
            return view('faq');
        });
        Route::get('/example-service/{index}', function ($index) {

            $service = SearchService::$serviceArray[$index];

            return view('pages.example-service-details')->with('service', $service);
        })->name('example-service');

        Route::get('/blog/{slug}', 'App\http\controllers\BlogController@show')->name('blog.show');
        Route::get('/blogs', 'App\http\controllers\BlogController@index')->name('blogs');


        Route::get('/pending', 'App\http\controllers\TalentProfileController@showPendingPage')->name('talent.pending');

        Route::get('/view-talent-profile/{id}', 'App\http\controllers\TalentController@showTalentProfile')->name('show.talent.profile');

        Route::get('/job-details/{id}', 'App\http\controllers\JobController@jobDetails')->name('talent.job.details');
        Route::get('/job-details', 'App\http\controllers\JobController@jobDetail')->name('talent.job.detail');
        Route::get('/view-profile/{id}', 'App\http\controllers\TalentProfileController@show')->name('show.profile');
        Route::get('/build-profile', 'App\http\controllers\TalentProfileController@index')->name('build.profile');
        Route::get('/talent-care', 'App\http\controllers\JobController@talentCare')->name('talent.care');
        Route::post('/submit-profile', 'App\http\controllers\TalentProfileController@store')->name('submit.profile');
        Route::post('/submit-contract', 'App\http\controllers\ContractController@store')->name('submit.contract');
        Route::post('/end-contract', 'App\http\controllers\ContractController@endContract')->name('end.contract');
        Route::post('/add-experience', 'App\http\controllers\TalentProfileController@addExperience')->name('add.experience');
        Route::post('/add-service', 'App\http\controllers\ServiceController@addService')->name('add.service');
        Route::post('/update-service', 'App\http\controllers\ServiceController@updateService')->name('update.service');
        Route::get('/edit-service/{id}', 'App\http\controllers\ServiceController@editService')->name('edit.service');
        Route::post('/add-portfolio', 'App\http\controllers\ServiceController@addPortfolio')->name('add.portfolio');
        Route::get('/service/{id}', 'App\http\controllers\ServiceController@serviceDetails')->name('service.details');
        Route::post('/add-education', 'App\http\controllers\TalentProfileController@addEducation')->name('add.education');
        Route::post('/accept-request', 'App\http\controllers\JobController@acceptRequest')->name('accept.request');
        Route::post('/reject-request', 'App\http\controllers\JobController@rejectRequest')->name('reject.request');
        Route::get('/client-view', 'App\http\controllers\TalentProfileController@showTalentProfile')->name('client.view');
        Route::post('/submit-for-review', 'App\http\controllers\TalentProfileController@submitForReview')->name('submit.for.review');

        Route::post('/update-hourly-rate', 'App\http\controllers\TalentProfileController@updateHourlyRate')->name('updateHourlyRate');
        Route::post('/update-hours-per-week', 'App\http\controllers\TalentProfileController@updateHoursPerWeek')->name('updateHoursPerWeek');
        Route::post('/update-ex-famous-company', 'App\http\controllers\TalentProfileController@updateExFamousCompany')->name('updateExFamousCompany');
        Route::post('/update-bio', 'App\http\controllers\TalentProfileController@updateBio')->name('updateBio');
        Route::post('/update-experience', 'App\http\controllers\TalentProfileController@updateExp')->name('updateExp');
        Route::post('/update-education', 'App\http\controllers\TalentProfileController@updateEdu')->name('updateEdu');
        Route::post('/update-country', 'App\http\controllers\TalentProfileController@updateCountry')->name('updateCountry');
        Route::post('/update-title', 'App\http\controllers\TalentProfileController@updateTitle')->name('updateTitle');

        Route::get('/assessment/{category_id}', 'App\http\controllers\AssesmentController@assessment')->name('assessment.init');
        Route::get('/quiz-running/{category_id}', 'App\http\controllers\AssesmentController@generateQuestions')->name('assessment.running');
        Route::get('/assessment/progress/{index}', 'App\http\controllers\AssesmentController@getQuestion')->name('assessment.progress');
        Route::post('/send-answer', 'App\http\controllers\AssesmentController@getAnswer')->name('assessment.sendAnswer');;
        Route::get('/results', 'App\http\controllers\AssesmentController@results')->name('assessment.result');

        // chat routes

        Route::post('/send-message', 'App\http\controllers\ChatController@sendMessage')->name('send.message');
        Route::post('/upload-chat-file', 'App\http\controllers\ChatController@uploadChatFile')->name('upload.chat.file');
        Route::get('/download-chat-file/{file_id}', 'App\http\controllers\ChatController@downloadFile')->name('download.chat.file');
        Route::get('/messages', 'App\http\controllers\ServiceController@messagesAll')->name('messages.all');
        Route::get('/messages/{service_transaction_id}', 'App\http\controllers\ServiceController@messages')->name('messages');


        Route::get('/redirect/admin/{id}', 'App\http\controllers\Client\AuthController@redirectToAdmin')->name('redirectToAdmin');

        Route::prefix('/client')->as('client.')->group(function () {

            Route::post('/auth/register', 'App\http\controllers\Client\AuthController@register')->name('register');
            Route::post('/auth/login', 'App\http\controllers\Client\AuthController@login')->name('login');

            Route::get('/view-talent-profile/{id}', 'App\http\controllers\TalentController@showTalentProfile')->name('show.profile');

            Route::get('/service/{id}', 'App\http\controllers\Client\ServiceController@show')->name('service.details');
        });

        Route::prefix('/client')->as('client.')->middleware(['auth', 'verified'])->group(function () {

            Route::get('/dashboard', 'App\http\controllers\Client\JobController@jobsPage')->name('dashboard');
            Route::get('/job-request/new', 'App\http\controllers\Client\JobController@create')->name('job.new');
            Route::post('/job-request/create', 'App\http\controllers\Client\JobController@store')->name('job.create');
            Route::get('/job-details/{id}', 'App\http\controllers\Client\JobController@jobDetails')->name('job.details');
            Route::get('/job-detail', 'App\http\controllers\Client\JobController@jobDetail')->name('job.detail');
            Route::get('/messages', 'App\http\controllers\Client\ServiceController@messagesAll')->name('messages.all');
            Route::get('/messages/{service_id}', 'App\http\controllers\Client\ServiceController@messages')->name('messages');
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

            Route::get('/login', 'App\http\controllers\Admin\AuthController@index')->name('admin.login.form');
            Route::post('/auth/login', 'App\http\controllers\Admin\AuthController@login')->name('admin.login');
        });

        Route::prefix('/admin')->group(function () {

            Route::get('/login', 'App\http\controllers\Admin\AuthController@index')->name('admin.login.form');
            Route::post('/auth/login', 'App\http\controllers\Admin\AuthController@login')->name('admin.login');
        });

        Route::group(['middleware' => ['auth']], function () {

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

        Route::post('feedback', 'App\http\Controllers\FeedbackController@store')->name('feedback.store');
        Route::post('email/isexist', 'App\http\Controllers\Client\AuthController@isEmailExist')->name('email.isexist');


        Route::get('auth/linkedin', [LinkedinController::class, 'linkedinRedirect']);
        Route::get('auth/linkedin/callback', [LinkedinController::class, 'linkedinCallback']);

        // Paypal ----------------------------------------------------------------

        Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
        Route::get('process-transaction/{id}', [PayPalController::class, 'processTransaction'])->name('process.payment');
        Route::get('success-transaction/{service_id}', [PayPalController::class, 'successTransaction'])->name('successTransaction');
        Route::get('cancel-transaction/{service_id}', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

        require __DIR__ . '/auth.php';
    }
);
