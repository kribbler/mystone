<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Authentication routes...
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('login', function(){ 
    return Redirect::to('auth/login', 301); 
});
Route::get('logout', function(){ 
    return Redirect::to('auth/logout', 301); 
});

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Main entry point into the application...
Route::get('/', 'IndexController@index');

// Contact form
Route::get('/contact', 'ContactController@index');
Route::post('/contact/submit', 'ContactController@submit');

// Admin routes...
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'Admin\AdminController@index');

    //Contact Form:
    Route::get('/contacts', 'ContactController@admin');
    Route::get('/contact/{contact}', 'ContactController@view');
    Route::get('/getContactFormItems', 'ContactController@getContactFormItems');
    Route::get('/upload', 'UploadController@index');  
    Route::post('/add', 'UploadController@uploadFiles');

    Route::get('/policies', 'PoliciesController@index');
    Route::get('/policies/generatePoliciesCsv', 'PoliciesController@generatePoliciesCsv'); 
    //Route::get('/policies/{policy}', 'PoliciesController@view');
    //Route::get('/getPolicies', 'PoliciesController@getPolicies');
    /*Route::group(['middleware' => ['web']], function () {
        Route::resource('policies', 'PoliciesController');
    });*/

    Route::get('/policy/{policy}', 'PoliciesController@view');

    Route::get('policies.json', array(  
        'as' => 'policies.json', 
        'uses' => 'PoliciesController@json' 
    ));

});

// Upload files...
Route::post('upload/file', 'UploadController@file');
Route::get('upload/view/{file_id}', 'UploadController@view');

Route::get('/dashboard', 'DashboardController@index');