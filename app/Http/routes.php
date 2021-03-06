<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        $message = '';
        return view('content/index', compact('message'));
    });

    Route::get('/insightly', function () {
        return view('content/insightly');
    });

    Route::get('/booknow', function () {
        return view('content/booknow');
    });
    Route::post('/booknow', 'GeneralController@booknow');

    Route::get('/remote-support-help', function () {
        return view('content/remote-support-help');
    });

    Route::get('/support-info', function () {
        return view('content/support-info');
    });

    // process customer contact request
    Route::post('/callback', 'GeneralController@callback');

    Route::get('/customerinfo', 'GeneralController@customerinfo');
    Route::post('/customerinfo', 'GeneralController@customerinfo_store');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
