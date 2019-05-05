<?php

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

Route::prefix('/auth')->group(function() {
    Route::get('/login/{provider}', 'Auth\SocialLoginController@redirectToProvider')->name('login.provider');
    Route::get('/login/{provider}/callback', 'Auth\SocialLoginController@handleProviderCallback')->name('login.provider.callback');

    Auth::routes();
});

Route::get('/profile', 'UserController@view')->name('profile');
Route::post('/profile/submit', 'UserController@submit')->name('profile.submit');
Route::get('/scoreboard', 'ScoreboardController@view')->name('scoreboard');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/license', function() {
    return response(file_get_contents(base_path('license.txt')), 200)->header('Content-Type', 'text/plain');
})->name('license');

Route::get('/locale/{locale}', 'LocaleController')->name('locale');

Route::get('/play', 'GameController@play')->name('play');
Route::get('/play/{id}', 'GameController@quiz')->name('quiz');
Route::post('/play/{id}/{question}/submit', 'GameController@submit')->name('quiz.sumbit');

Route::get('/admin', "AdminDashController@view")->middleware("is_admin")->name('dash');


Route::get('/admin/addAttraction', "AddAttractionController@view")->middleware("is_admin")->name('addAttraction');
Route::post('/admin/addAttraction', 'AddAttractionController@submit')->middleware("is_admin")->name('addAttraction.submit');

Route::get('/admin/editAttraction/{id}', 'EditAttractionController@view')->middleware("is_admin")->name('editAttraction');
Route::post('/admin/editAttraction/{id}', 'EditAttractionController@submit')->middleware("is_admin")->name('editAttraction.submit');