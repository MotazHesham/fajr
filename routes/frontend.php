<?php 


Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {

    Route::get('/','HomeController@home')->name('home');
    Route::post('subscription','HomeController@subscription')->name('subscription');
    Route::view('/job', 'frontend.job')->name('job_application');
    Route::Post('/jobRequest','RequestsController@JobRequest')->name('saveJobRequest');
    Route::view('/price','frontend.price')->name('price_application');
    Route::Post('/priceRequest','RequestsController@PriceRequest')->name('savePriceRequest');
    Route::post('jobresquests/media', 'RequestsController@storeMedia')->name('jobresquests.storeMedia');
    Route::post('jobresquests/ckmedia', 'RequestsController@storeCKEditorImages')->name('jobresquests.storeCKEditorImages');
    


});