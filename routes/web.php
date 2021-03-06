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

Auth::routes();

// Homepage
Route::get('/', 'HomePageController@home');
Route::view('about', 'pages.about');
Route::view('contact', 'pages.contact');

// User's profile
Route::get('profile/{username}/{id}', 'HomePageController@getProfile')->name('user.profile');
Route::post('profile/{username}/{id}', 'HomePageController@postProfile')->name('user.update');

// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

// Logout
Route::get('logout', 'HomePageController@logout')->name('logout');

// handle ajax
Route::get('category/{category_id}', 'QuizController@category');

// Quiz page
Route::get('{category_slug}/{topic_slug}', 'QuizController@quiz')->name('quiz');
Route::get('{category_slug}/{topic_slug}/{id}', 'QuizController@reviewQuiz')->name('review');

// handle question
Route::get('question', 'QuizController@handleQuestion');
