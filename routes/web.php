<?php

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::resource('projects', 'ProjectsController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // News
    Route::delete('news/destroy', 'NewsController@massDestroy')->name('news.massDestroy');
    Route::post('news/media', 'NewsController@storeMedia')->name('news.storeMedia');
    Route::post('news/ckmedia', 'NewsController@storeCKEditorImages')->name('news.storeCKEditorImages');
    Route::resource('news', 'NewsController');

    // Sliders
    Route::delete('sliders/destroy', 'SlidersController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SlidersController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SlidersController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SlidersController');

    // Subscription
    Route::delete('subscriptions/destroy', 'SubscriptionController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

     // Policies
    Route::delete('policies/destroy', 'PoliciesController@massDestroy')->name('policies.massDestroy');
    Route::post('policies/media', 'PoliciesController@storeMedia')->name('policies.storeMedia');
    Route::post('policies/ckmedia', 'PoliciesController@storeCKEditorImages')->name('policies.storeCKEditorImages');
    Route::resource('policies', 'PoliciesController');

    // Management
    Route::delete('management/destroy', 'ManagementController@massDestroy')->name('management.massDestroy');
    Route::resource('management', 'ManagementController');

    // Sections
    Route::delete('sections/destroy', 'SectionsController@massDestroy')->name('sections.massDestroy');
    Route::resource('sections', 'SectionsController');

    // Descriptions
    Route::delete('descriptions/destroy', 'DescriptionsController@massDestroy')->name('descriptions.massDestroy');
    Route::post('descriptions/media', 'DescriptionsController@storeMedia')->name('descriptions.storeMedia');
    Route::post('descriptions/ckmedia', 'DescriptionsController@storeCKEditorImages')->name('descriptions.storeCKEditorImages');
    Route::resource('descriptions', 'DescriptionsController');

    // Success Partners
    Route::delete('success-partners/destroy', 'SuccessPartnersController@massDestroy')->name('success-partners.massDestroy');
    Route::post('success-partners/media', 'SuccessPartnersController@storeMedia')->name('success-partners.storeMedia');
    Route::post('success-partners/ckmedia', 'SuccessPartnersController@storeCKEditorImages')->name('success-partners.storeCKEditorImages');
    Route::resource('success-partners', 'SuccessPartnersController');

    // Crew Type
    Route::delete('crew-types/destroy', 'CrewTypeController@massDestroy')->name('crew-types.massDestroy');
    Route::post('crew-types/media', 'CrewTypeController@storeMedia')->name('crew-types.storeMedia');
    Route::post('crew-types/ckmedia', 'CrewTypeController@storeCKEditorImages')->name('crew-types.storeCKEditorImages');
    Route::resource('crew-types', 'CrewTypeController');

    // Fajr Crew
    Route::delete('fajr-crews/destroy', 'FajrCrewController@massDestroy')->name('fajr-crews.massDestroy');
    Route::resource('fajr-crews', 'FajrCrewController');

    // Jobresquest
    Route::delete('jobresquests/destroy', 'JobresquestController@massDestroy')->name('jobresquests.massDestroy');
    Route::post('jobresquests/media', 'JobresquestController@storeMedia')->name('jobresquests.storeMedia');
    Route::post('jobresquests/ckmedia', 'JobresquestController@storeCKEditorImages')->name('jobresquests.storeCKEditorImages');
    Route::resource('jobresquests', 'JobresquestController');

     // Quotation Request
    Route::delete('quotation-requests/destroy', 'QuotationRequestController@massDestroy')->name('quotation-requests.massDestroy');
    Route::post('quotation-requests/media', 'QuotationRequestController@storeMedia')->name('quotation-requests.storeMedia');
    Route::post('quotation-requests/ckmedia', 'QuotationRequestController@storeCKEditorImages')->name('quotation-requests.storeCKEditorImages');
    Route::resource('quotation-requests', 'QuotationRequestController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
