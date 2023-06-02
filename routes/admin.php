<?php

Route::get('/talent-profile/{id}', 'App\http\controllers\Admin\AdminController@userDetails')->name('admin.show.profile');
Route::get('/dashboard','App\http\controllers\Admin\DashboardController@index')->name('admin.dashboard');
Route::get('/users','App\http\controllers\Admin\AdminController@users')->name('admin.users');
Route::get('/clients','App\http\controllers\Admin\AdminController@clients')->name('admin.clients');
Route::get('/clients/delete/{id}','App\http\controllers\Admin\AdminController@destroy')->name('admin.clients.delete');
Route::get('/projects','App\http\controllers\Admin\JobController@index')->name('admin.projects');
Route::get('/project/details/{id}','App\http\controllers\Admin\JobController@details')->name('admin.project.details');
Route::post('/update-transaction-status','App\http\controllers\Admin\JobController@updateTransactionStatus')->name('admin.update.transaction.status');
Route::post('/users/status/update','App\http\controllers\Admin\AdminController@updateStatus')->name('admin.update.users.status');
Route::get('/categories','App\http\controllers\Admin\SkillController@index')->name('admin.categories');
Route::post('/category/insert','App\http\controllers\Admin\SkillController@storeCategory')->name('admin.category.insert');
Route::get('/skills','App\http\controllers\Admin\SkillController@skills')->name('admin.skills');
Route::post('/skill/insert','App\http\controllers\Admin\SkillController@store')->name('admin.skill.insert');
Route::post('/assign-talent','App\http\controllers\Admin\JobController@assignTalent')->name('admin.assign.talent');
Route::get('/feedbacks','App\http\controllers\Admin\AdminController@feedbacks')->name('admin.feedbacks');

Route::get('/questions','App\http\controllers\Admin\QuestionController@index')->name('admin.questions');
Route::get('/assessment-categories','App\http\controllers\Admin\QuestionController@categories')->name('admin.assessment.categories');
Route::post('/add-questions','App\http\controllers\Admin\QuestionController@store')->name('admin.add.question');
Route::post('/add-assessment-category','App\http\controllers\Admin\QuestionController@storeAssessmentCategory')->name('admin.add.assessment.category');