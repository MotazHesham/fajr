<?php 


Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {

    Route::get('/','HomeController@home')->name('home');
    Route::post('subscription','HomeController@subscription')->name('subscription');
    Route::view('/job', 'frontend.job_application')->name('job_application');
    Route::Post('/jobRequest','RequestsController@JobRequest')->name('saveJobRequest');
    Route::view('/request','frontend.request')->name('request');
    Route::Post('/priceRequest','RequestsController@PriceRequest')->name('savePriceRequest');
    Route::post('jobresquests/media', 'RequestsController@storeMedia')->name('storeMedia');
    Route::get('/service','serviceController@index')->name('service');
    Route::get('/service_details/{id}','serviceController@show')->name('service-details');
    Route::get('/about','HomeController@about')->name('about');
    Route::get('/vision','HomeController@vision')->name('vision');
    Route::get('/department','HomeController@department')->name('department');
    Route::get('/management','HomeController@management')->name('management');
    Route::get('/policies','HomeController@policies')->name('policies');
    Route::get('/tasks','HomeController@tasks')->name('tasks');
    Route::get('/projects','ProjectController@index')->name('projects');
    Route::get('/project_details/{id}','ProjectController@show')->name('project-details');
    Route::get('/news','NewController@index')->name('news');
    Route::get('/new_details/{id}','NewController@show')->name('new_details');
    Route::get('/crew','HomeController@crew')->name('crew');
    Route::get('/certificates','HomeController@certificate')->name('certificates');
    Route::view('/contact','frontend.contact')->name('contact');
    Route::Post('/contact_save','RequestsController@contact')->name('save_contact');
 
    
    

});