<?php 


Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {

    Route::get('/','HomeController@home')->name('home');
    Route::post('subscription','HomeController@subscription')->name('subscription');

});