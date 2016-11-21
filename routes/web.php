<?php
use App\Http\Middleware\check_username;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('front.index');
})->name("home");

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/user/{username}','user_controller@show_user_info')->middleware('auth','username');
Route::post('student_entry','user_controller@student_entry');
Route::post('/student_details_entry','user_controller@student_details_entry');
Route::get('/user/{username}/profile','user_controller@show_user_profile')->middleware('auth','username');
Route::get('user/{username}/profile/edit','user_controller@show_user_profile_edit')->middleware('auth','username');