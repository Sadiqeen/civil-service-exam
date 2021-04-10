<?php

use Illuminate\Support\Facades\Route;

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

/* ----------------------------- Authentication ----------------------------- */

Auth::routes(['register' => false]);

/* ---------------------------------- Guest --------------------------------- */

Route::get('/', 'Guest\HomeController@home');

/* ---------------------------------- Auth ---------------------------------- */

Route::middleware('auth')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('subject', 'SubjectController')->except([
        'show'
    ]);
    Route::resource('subject.question', 'QuestionController')->except([
        'show'
    ]);

    // Setting
    Route::get('setting', 'SettingController@index')->name('setting.index');
    Route::post('setting', 'SettingController@update')->name('setting.update');
});

/* --------------------------------- CRONJOB -------------------------------- */

Route::get('/post-to-social/{token}', 'SocialPostController@post');
Route::get('/comment-to-post/{token}', 'SocialPostController@comment');
